<?php
require_once("./libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";

//初期値
$blank = 11;
$name = "";
$time = "";

//データベースへの接続
$user = "root";
$pass = "";


try{
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

//テーブルの作成
$create_query = <<< _TABLE_
  CREATE TABLE IF NOT EXISTS touroku1 (
    id           int not null auto_increment primary key,
    pass_id      TEXT,
    register_id  TEXT,
    name         TEXT,
    mail         TEXT,
    pass         TEXT,
    time         INTEGER
  );
_TABLE_;
$result = $db->exec($create_query);
if($result === false) {
  print_r($db->errorInfo());
  exit;
}


//ユニークなIDの作成
$create_id = uniqid();


//データの挿入
if(isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["pass"])){
  if(($_POST["name"] == "") || ($_POST["mail"] == "") || ($_POST["pass"] == "")){
    $blank = 10;
  } else {
    $template = "INSERT INTO touroku1 (pass_id, register_id, name, mail, pass, time)".
                "VALUES(?,?,?,?,?,?);";
    $stmt = $db->prepare($template);
    $stmt->execute(array($create_id, 0, $_POST["name"], $_POST["mail"], $_POST["pass"], time()));

    //番号の取得
    $select = "SELECT id FROM touroku1 WHERE pass_id = :pass_id";
    $stmt = $db->prepare($select);
    $stmt->bindValue('pass_id',$create_id);
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_COLUMN);

    //本登録用urlの取得
    if(empty($_SERVER["HTTP"])){
      $url = "http://".$_SERVER["HTTP_HOST"]."/kadai4_3/touroku.php"."?product=".$result;
    } else {
      $url = "https://".$_SERVER["HTTP_HOST"]."/kadai4_3/touroku.php"."?product=".$result;
    }

    mb_language("japanese");
    mb_internal_encoding("UTF-8");

    $to = $_POST["mail"];

    
    $header= "co-19-194.99sv-coco.com@sv01.cocospace.com";

    $subject = "ユーザー登録";
    $body = "以下URLから24時間以内に登録を行ってください。\n";
    $body.= $url."\n";
    $body.= "24時間を過ぎた場合、仮登録は自動で登録が解除されます。\n";

    $r = mb_send_mail($to, $subject, $body, $header);
    if (!$r) {
        echo "失敗";
    }
  }
}

$select_query = "SELECT * FROM touroku1";
$stmt = $db->query($select_query);
foreach($stmt as $row){
  $id = $row["pass_id"];
  if ($id == $create_id) {
    $name = $row["name"];
    $pass = $row["pass"];
    $time = date("Y/m/d H:i:s", $row["time"]);
  }
}

$smarty->assign('id',$id);
$smarty->assign('name',$name);
$smarty->assign('pass',$pass);
$smarty->assign('time',$time);

$smarty->assign('flag',$blank);

$smarty->assign("design", $design);

$smarty->display('sent.html');

?>