<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-20 10:20:49
  from 'C:\xampp\htdocs\kadai4_2\templates\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3dcff15ee765_73160469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81f2d57c2b2ad13daefce10db6a35a119896b0e1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_2\\templates\\login.html',
      1 => 1597886447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3dcff15ee765_73160469 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charaset="utf-8">
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 10) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/login/sp.css" rel="stylesheet" media="all" />
    <title>(Android・iPhone)ログインページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 11) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/login/mobile.css" rel="stylesheet" media="all" />
    <title>(mobile)ログインページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 12) {?>
    <meta name="viewport" content="width=768,user-scalable=no">
    <link href="templates/login/tablet.css" rel="stylesheet" media="all" />
    <title>(Android・iPad)ログインページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 13) {?>
    <meta name="viewport" content="width=width=device-width">
    <link href="templates/login/pc.css" rel="stylesheet" media="all" />
    <title>(PC)ログインページ</title>
    <?php }?>
  </head>

  <body>
    <?php if ($_smarty_tpl->tpl_vars['flag']->value == 11) {?>
      <h3>簡易掲示板へのログイン</h3>
  
      <form action="" method="post">
        <div class="form-item">パスワード：<input type="password" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['cookie_pass']->value;?>
" ></div>
        <div class="form-item">ID:<input type="text" name="id" value="<?php echo $_smarty_tpl->tpl_vars['cookie_id']->value;?>
"></div>
        <div><input type="submit" value="ログイン"></div>
      </form>

      <a href="kadai3_4.php">登録はここから</a>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['flag']->value == 10) {?>
      <h3>ログイン失敗</h3>
      <div>ユーザー登録が完了していない、</div>
      <div>パスワードまたはIDが違います。</div>
    <?php }?>
    
  </body>
</html><?php }
}
