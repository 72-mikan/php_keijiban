<?php
require_once("./libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = "templates";
$smarty->compile_dir = "templates_c";

$flag = 11;

$cookie_pass = "";
$cookie_id = "";

//初期値
$id = "";
$pass = "";
$name = "";

//データベースへの接続
$user = 'root';
$password = '';

try {
  $db = new PDO('mysql:host=localhost;dbname=test;charaset=utf8;', $user, $password);
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

if(isset($_POST["id"]) && isset($_POST["pass"])){
  $form_id = $_POST["id"];
  $form_pass = $_POST["pass"];
  $select_query = "SELECT pass_id, register_id, pass, name FROM touroku1 WHERE pass_id = '$form_id' ";
  $stmt = $db->query($select_query);
  foreach($stmt as $row){
    $register = $row["register_id"];
    $id = $row["pass_id"];
    $pass = $row["pass"];
    $name = $row["name"];
  }

  if($id == $form_id && $pass == $form_pass && $register == 1){
    setcookie('user_pass',$pass,time()+60*60*24*7);
    setcookie('user_id',$id,time()+60*60*24*7);
    session_start();
    $_SESSION['user_name'] = $name;
    $_SESSION['user_id'] = $id;
    header("location: keigiban.php");exit;
  }else{
    $flag = 10;
  }
}

if(isset($_COOKIE['user_pass']) && isset($_COOKIE["user_id"])){
  $cookie_pass = $_COOKIE['user_pass'];
  $cookie_id = $_COOKIE['user_id'];
}

$smarty->assign("cookie_pass",$cookie_pass);
$smarty->assign("cookie_id",$cookie_id);

$smarty->assign("flag",$flag);

$smarty->assign("design", $design);

$smarty->display("login.html");

?>