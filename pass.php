<?php
//キャッシュ部分
require_once("Cache/Lite.php");

$cache_opt = array(
  "cacheDir" => "Cache/tmp/", //キャッシュ保存場所
  "lifeTime" => 3600, //保存時間
  "caching" => true,
  "automaticSerialization" => true,
  "automaticCleaningFactor" => 20 //自動キャッシュ削除
);
$cache = new Cache_Lite($cache_opt);

require_once("./libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";

session_start();
$cache_id = $_SESSION['user_id'];

//初期値
$delete_pass = "";
$edit_pass = "";
$pass_word = "";
$blank = "";
$delete_num = "";
$edit_num = "";
$id = "";
$name = "";
$text = "";
$edit_name2 = "";
$edit_text2 = "";
$edit_pass2 = "";
$file_name = "";

//データベースへの接続
$user = 'root';
$pass = '';

try {
  $db = new PDO('mysql:host=localhost;dbname=test;charaset=utf8', $user, $pass);
} catch (PDOException $e) {
  echo "データベースに接続できません。".$e->getMessage();
  exit;
}

//デザインの分別
$ua = $_SERVER['HTTP_USER_AGENT'];
if((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false)){
  $design = 10;
}elseif((strpos($ua, 'mobile' !== false))){
  $design = 11;
}elseif((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)){
  $design = 12;
} else {
  $design = 13;
}

//データの更新
$update = <<< _UPDATE_
  SET @i := 0;
  UPDATE chatlog3 SET id = (@i := @i+1);
_UPDATE_;

//前ページから削除番号の受け取り
if(!empty($_POST["delete"])){
  $delete_num = $_POST["delete"];
}

//前ページから削除番号の受け取り
if(!empty($_POST["edit"])){
  $edit_num = $_POST["edit"];
}

//削除パスワードの比較
if(isset($_POST["delete_pass"])){
  $delete_num = $_POST["delete_num1"];
  /*
  $stmt = $db->query("SELECT id, pass from chatlog3 WHERE id = $delete_num");
  foreach($stmt as $row){
    $id = $row["id"];
    $pass_word = $row["pass"];
  }
  if($pass_word == $_POST["delete_pass"]){
    $delete_pass = 10;
  }else{
    $delete_pass = 11;
  }
  */
  //キャッシュ削除
  if($data = $cache->get($cache_id)){
    $rows = $data;
    foreach($rows as $row){
      if($row["id"] == $delete_num){
        $id = $row["id"];
        $pass = $row["pass"];
      } 
    }
    if($pass == $_POST["delete_pass"]){
      $delete_pass = 10;
    }else{
      $delete_pass = 11;
    }
  }
  
}

//編集パスワードの比較
if(isset($_POST["edit_pass"])){
  $edit_num = $_POST["edit_num1"];
  /*
  $stmt = $db->query("SELECT id, name, body, pass from chatlog3 WHERE id = $edit_num");
  foreach($stmt as $row){
    $id = $row["id"];
    $name = $row["name"];
    $text = $row["body"];
    $pass_word = $row["pass"];
  }
  if($pass_word == $_POST["edit_pass"]){
    $edit_pass = 10;
  }else{
    $edit_pass = 11;
  }
  */
  //キャッシュ削除
  if($data = $cache->get($cache_id)){
    $rows = $data;
    foreach($rows as $row){
      if($row["id"] == $edit_num){
        $id = $row["id"];
        $pass = $row["pass"];
      }
    }
    if($pass == $_POST["edit_pass"]){
      $edit_pass = 10;
    }else{
      $edit_pass = 11;
    }
  }
}

//データ削除
if(isset($_POST["delete_num2"])){
  $delete_select = $_POST["delete_select"];
  $delete = $_POST["delete_num2"];

  //削除するファイルのパス
  $stmt = $db->query("SELECT file_pass from chatlog3 WHERE id = $delete");
  foreach($stmt as $row){
    $file_pass = $row["file_pass"];
  }

  if($delete_select == 10){
    $sql = "DELETE FROM chatlog3 WHERE id = :id";
    $stmt = $db->prepare($sql);
    $params = array(':id'=>$delete);
    $stmt->execute($params);

    $db->exec($update);

    //ファイルの削除
    unlink($file_pass);

    //キャッシュ削除
    if($data = $cache->get($cache_id)){
      $rows = $data;
      foreach($rows as $row){
        if($row["id"] != $delete){
          if($row["id"] >= $delete){
            $row["id"] = $row["id"] - 1;
          }
          $escape[] = $row;
        }
      }
      $cache->save($escape, $cache_id);
    }
    
    header("location: keigiban.php"); exit;
  }
  //削除しない場合最初のページに戻る
  if($delete_select == 11){
    header("location: keigiban.php"); exit;
  }
}

//データの編集
if(isset($_POST["edit_name"]) && isset($_POST["edit_text"])) {
  if($_POST["edit_name"] == "" || $_POST["edit_text"] == "" || $_POST["pass"] == ""){
    $edit_pass = 10;
    $blank = 10;
    $name = $_POST["edit_name"];
    $text = $_POST["edit_text"];
    $pass = $_POST["pass"];
    $id = $_POST["edit_num2"];
  }else{
    $edit = $_POST["edit_num2"];
    $stmt = $db->query("SELECT id,file_pass from chatlog3 WHERE id = $edit");
    foreach($stmt as $row){
      $file_name = $row["file_pass"];
      $id = $row["id"];
    }

    //画像・動画ファイルのDBへ保存
    if (isset(($_FILES["upfile"]))) {
      //一時保存先のパス
      $create_file_name = uniqid();
      $tmp_file = $_FILES['upfile']['tmp_name'];
      if(!empty($tmp_file)){
        $file = file_get_contents($tmp_file);
      }
      
      //ファイルの検証
      if (!is_uploaded_file($tmp_file)) {
        $edit_pass = 12;
        $edit_name2 = $_POST["edit_name"];
        $edit_text2 = $_POST["edit_text"];
        $edit_pass2 = $_POST["pass"];
      } else {
        //ファイルタイプの取得
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $type = finfo_file($finfo, $tmp_file);
        finfo_close($finfo);
      
        $filetype_array = array(
          'gif' => 'image/gif',
          'jpg' => 'image/jpeg',
          'png' => 'image/png',
          'mp4' => 'video/mp4',
        );

        if ($extension = array_search($type, $filetype_array, true)) {
          if ($extension == 'gif' || $extension == 'jpg' || $extension == 'png') {
            //画像保存先ファイルのパス
            $save_file = dirname(__FILE__)."/img/".$create_file_name.".".$extension;
            $file_pass = "img/".$create_file_name.".".$extension;
            $file = "UPDATE chatlog3 SET name = :name, body = :body, pass = :pass, ctime = :ctime, file_pass = :file_pass, file_type = :file_type WHERE id = :id";
            $stmt = $db->prepare($file);
            $params = array(':name' =>$_POST["edit_name"] , ':body' => $_POST["edit_text"], ':pass' => $_POST["pass"], ':ctime' => time(), ':file_pass' => $file_pass, ':file_type' => $extension, 'id' => $_POST["edit_num2"]);
            $stmt->execute($params);

            //ファイルの削除
            unlink($file_name);

            //キャッシュ編集
            if($data = $cache->get($cache_id)){
              $rows = $data;
              foreach($rows as $row){
                if($row["id"] == $_POST["edit_num2"]){
                  $row["name"] = $_POST["edit_name"];
                  $row["body"] = $_POST["edit_text"];
                  $row["pass"] = $_POST["pass"];
                  $row["time"] = date("Y/m/d H:i:s", time());
                  $row["file_pass"] = $file_pass;
                  $row["file_type"] = $extension;
                }
                $escape[] = $row;
              }
              $cache->save($escape, $cache_id);
            }
            
            header("location:keigiban.php");
          }else if($extension == 'mp4'){
            //動画保存先ファイルのパス
            $save_file = dirname(__FILE__)."/video/".$create_file_name.".".$extension;
            $file_pass = "video/".$create_file_name.".".$extension;
            $file = "UPDATE chatlog3 SET name = :name, body = :body, pass = :pass, ctime = :ctime, file_pass = :file_pass, file_type = :file_type WHERE id = :id";
            $stmt = $db->prepare($file);
            $params = array(':name' =>$_POST["edit_name"] , ':body' => $_POST["edit_text"], ':pass' => $_POST["pass"], ':ctime' => time(), ':file_pass' => $file_pass, ':file_type' => $extension, 'id' => $_POST["edit_num2"]);
            $stmt->execute($params);

            //ファイルの削除
            unlink($file_name);

            //キャッシュ編集
            if($data = $cache->get($cache_id)){
              $rows = $data;
              foreach($rows as $row){
                if($row["id"] == $_POST["edit_num2"]){
                  $row["name"] = $_POST["edit_name"];
                  $row["body"] = $_POST["edit_text"];
                  $row["pass"] = $_POST["pass"];
                  $row["time"] = date("Y/m/d H:i:s", time());
                  $row["file_pass"] = $file_pass;
                  $row["file_type"] = $extension;
                }
                $escape[] = $row;
              }
              $cache->save($escape, $cache_id);
            }

            header("location:keigiban.php");
          } else {
            //MIMEタイプが不正
            echo "アップロードされたファイルが不正です。";
            exit;
          }
          if(!move_uploaded_file($tmp_file,$save_file)){
            echo "アップロードに失敗しました。";
            exit;
          }
        }
      }
    }
  }
}

//画像・動画なしのアップロード
if(isset($_POST["edit_num3"])){
  $edit_select = $_POST["edit_select"];
  $file_name = $_POST["file_name"];

  if($edit_select == 10){
    $sql = "UPDATE chatlog3 SET name = :name, body = :body, pass = :pass, ctime = :ctime, file_pass = :file_pass, file_type = :file_type WHERE id = :id";
    $stmt = $db->prepare($sql);
    $params = array(':name' => $_POST["edit_name2"], ':body' => $_POST["edit_text2"], ':pass' => $_POST["edit_pass2"], ':ctime' => time(), ':file_pass' => NULL, ':file_type' => NULL, 'id' => $_POST["edit_num3"]);
    $stmt->execute($params);

    //ファイルの削除
    unlink($file_name);

    //キャッシュ編集
    if($data = $cache->get($cache_id)){
      $rows = $data;
      foreach($rows as $row){
        if($row["id"] == $_POST["edit_num3"]){
          $row["name"] = $_POST["edit_name2"];
          $row["body"] = $_POST["edit_text2"];
          $row["pass"] = $_POST["edit_pass2"];
          $row["time"] = date("Y/m/d H:i:s", time());
          $row["file_pass"] = "";
          $row["file_type"] = "";
        }
        $escape[] = $row;
      }
      $cache->save($escape, $cache_id);
    }

    header("location: keigiban.php"); exit;
  }
  //削除しない場合最初のページに戻る
  if($edit_select == 11){
    header("location: keigiban.php"); exit;
  }
}

//$delete_numをデザイン部分に渡す
$smarty->assign("delete_num", $delete_num);
//$delete_passをデザイン部分に渡す
$smarty->assign("delete_pass", $delete_pass);

//$edit_numをデザイン部分に渡す
$smarty->assign("edit_num", $edit_num);
//$edit_passをデザイン部分に渡す
$smarty->assign("edit_pass", $edit_pass);

//対象番号をデザイン部分に渡す
$smarty->assign("id", $id);

//名前、内容、パスワードをデザイン部分に渡す
$smarty->assign("name", $name);
$smarty->assign("text", $text);
$smarty->assign("pass_word", $pass_word);

//判別用の$flagをデザイン部分に渡す
$smarty->assign("flag", $blank);

//編集用名前、内容、パスワード、ファイル名をデザイン部分に渡す
$smarty->assign("edit_name2", $edit_name2);
$smarty->assign("edit_text2", $edit_text2);
$smarty->assign("edit_pass2", $edit_pass2);
$smarty->assign("file_name", $file_name);

$smarty->assign("design", $design);

$smarty->display('pass.html');

?>