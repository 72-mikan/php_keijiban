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

//Smarty部分
require_once("./libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";

session_start();
$session_name = $_SESSION['user_name'];
$cache_id = $_SESSION['user_id'];
$smarty->assign("session_name",$session_name);

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

//初期値
$blank = 11;
$id[0] = "番号を選択してください";
$rows[0] = array(
  "id"   => 0,
  "name" => "",
  "body" => "投稿がありません",
  "time" => "",
  "file_pass" => "",
  "file_type" => ""
);

//自動サイト更新
$script_name = $_SERVER["SCRIPT_NAME"];

//データベースへの接続
$user = 'root';
$pass = '';

try {
  $db = new PDO('mysql:host=localhost;dbname=test;charaset=utf8;', $user, $pass);
} catch (PDOException $e) {
  echo "データベースに接続できません。".$e->getMessage();
  exit;
}

//テーブル作成
$create_query = <<< _CHAT_
  CREATE TABLE IF NOT EXISTS chatlog3 (
    id       int not null auto_increment primary key,
    name       TEXT NOT NULL,
    body       TEXT NOT NULL,
    pass       TEXT NOT NULL,
    file_pass  TEXT,
    file_type  TEXT,
    ctime      INTEGER
  );
_CHAT_;
$result = $db->exec($create_query);
if($result === false) {
  print_r($db->errorInfo()); 
  exit;
}

 //データの更新
$update = <<< _UPDATE_
  SET @i := 0;
  UPDATE chatlog3 SET id = (@i := @i+1); 
_UPDATE_;

//データを挿入
if(isset($_POST["name"]) && isset($_POST["body"])) {
  if($_POST["name"] == "" || $_POST["body"] == ""){
    $blank = 10;
  }else{
    $template = "INSERT INTO chatlog3 (name, body, pass, ctime)".
                "VALUES(?,?,?,?);";
    $stmt = $db->prepare($template);
  
    $stmt->execute(array($_POST["name"], $_POST["body"], $_POST["pass"], time()));

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
        "pass" => $_POST["pass"],
        "time" => date("Y/m/d H:i:s", time()),
        "file_pass" => "",
        "file_type" => ""
      );
      
    }

    $cache->save($rows, $cache_id);

    header("location: $script_name"); exit;
  }
}

//未入力かの判定
$smarty->assign("blank", $blank);

//削除・編集番号の取得
$select_query = "SELECT * FROM chatlog3 ORDER BY id ASC";
$stmt = $db->query($select_query);
foreach($stmt as $row){
  $id[] = $row["id"];
}

$smarty->assign("id",$id);

//表示項目の取得
if($data = $cache->get($cache_id)){
  $rows = $data;
  echo "キャッシュ利用中";
} else {
  
  $select_query = "SELECT * FROM chatlog3 ORDER BY id ASC";
  $stmt = $db->query($select_query);

  foreach ($stmt as $row) {
    $id = $row["id"];
    $name = $row["name"];
    $body = $row["body"];
    $pass = $row["pass"];
    $file_pass = $row["file_pass"];//ファイルパス
    $file_type = $row["file_type"];//ファイルのタイプ
    $time = date("Y/m/d H:i:s", $row["ctime"]);
    
    if($id == 1){
      $rows[0] = array(
        "id"   => $id,
        "name" => $name,
        "body" => $body,
        "pass" => $pass,
        "time" => $time,
        "file_pass" => $file_pass,
        "file_type" => $file_type
      );
    } else {
      $rows[] = array(
        "id"   => $id,
        "name" => $name,
        "body" => $body,
        "pass" => $pass,
        "time" => $time,
        "file_pass" => $file_pass,
        "file_type" => $file_type
      );
    } 
  }

  
  $cache->save($rows, $cache_id);
  echo "キャッシュ保存中";
}






$smarty->assign("contents",$rows);

$smarty->assign("design", $design);

$smarty->display("keigiban.html");

?>