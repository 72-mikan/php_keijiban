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
$blank = 11;

//データベースへの接続
$user = 'root';
$pass = '';

try {
  $db = new PDO('mysql:host=localhost;dbname=test;charaset=utf8;', $user, $pass);
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

//データを挿入
if(isset($_POST["name"]) && isset($_POST["body"])) {
  if($_POST["name"] == "" || $_POST["body"] == "" || $_POST["pass"] == ""){
    $blank = 10;
  }else{
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
        echo "アップロードされたファイルが不正です。";
        exit;
      }
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
          $file = "INSERT INTO chatlog3 (name, body, pass, ctime, file_pass, file_type)".
                  "VALUES(?,?,?,?,?,?);";
          $stmt = $db->prepare($file);
          $stmt->execute(array($_POST["name"], $_POST["body"], $_POST["pass"], time(), $file_pass, $extension));
          $db->exec($update);
          if($data = $cache->get($cache_id)){
            $count = 1;
            $rows = $data;
            foreach($rows as $row){
              $count++;
            }
      
            $rows[] = array(
              "id"   => $count,
              "name" => $_POST["name"],
              "body" => $_POST["body"],
              "time" => date("Y/m/d H:i:s", time()),
              "file_pass" => $file_pass,
              "file_type" => $extension
            );
            
          }
      
          $cache->save($rows, $cache_id);
          //header("location:kadai2_db.php");
        }else if($extension == 'mp4'){
          //動画保存先ファイルのパス
          $save_file = dirname(__FILE__)."/video/".$create_file_name.".".$extension;
          $file_pass = "video/".$create_file_name.".".$extension;
          $file = "INSERT INTO chatlog3 (name, body, pass, ctime, file_pass, file_type)".
                  "VALUES(?,?,?,?,?,?);";
          $stmt = $db->prepare($file);
          $stmt->execute(array($_POST["name"], $_POST["body"], $_POST["pass"], time(), $file_pass, $extension));
          $db->exec($update);
          if($data = $cache->get($cache_id)){
            $count = 1;
            $rows = $data;
            foreach($rows as $row){
              $count++;
            }
      
            $rows[] = array(
              "id"   => $count,
              "name" => $_POST["name"],
              "body" => $_POST["body"],
              "time" => date("Y/m/d H:i:s", time()),
              "file_pass" => $file_pass,
              "file_type" => $extension
            );
            
          }
      
          $cache->save($rows, $cache_id);
          //header("location:kadai2_db.php");
        } 

        if(!move_uploaded_file($tmp_file,$save_file)){
          echo "アップロードに失敗しました。";
          exit;
        } 

        header("location:keigiban.php");
        exit;

      } else {
        //MIMEタイプが不正
        echo "アップロードされたファイルが不正です。";
        exit;
      }
    }
  }
}

$smarty->assign("flag", $blank);

$smarty->assign("design", $design);

$smarty->display("file_up1.html");

?>