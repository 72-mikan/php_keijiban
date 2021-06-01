<?php
require_once("./libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";

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


//データの挿入
if(isset($_GET['product'])){
  $product = $_GET['product'];
  $time = time();
  $template = "UPDATE touroku1 SET register_id = :register_id, time = :time WHERE id = :id";
  $stmt = $db->prepare($template);
  $params = array(':register_id' => 1, ':time' => $time, ':id' => $product);
  $stmt->execute($params);
}

$select_query = "SELECT * FROM touroku1";
$stmt = $db->query($select_query);
foreach($stmt as $row){
  $id = $row["id"];
  if ($id == $product) {
    $user_id = $row["pass_id"];
    $name = $row["name"];
    $pass = $row["pass"];
    $ctime = $row["time"];
    $ctime = date("Y/m/d H:i:s", $ctime);
  }
}

$smarty->assign("user_id",$user_id);
$smarty->assign("name",$name);
$smarty->assign("pass",$pass);
$smarty->assign("time",$ctime);

$smarty->assign("design", $design);

$smarty->display('touroku.html');

?>