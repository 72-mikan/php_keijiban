<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-20 10:04:07
  from 'C:\xampp\htdocs\kadai4_2\templates\kadai3_4.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3dcc07c06e22_83645244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '124f7878a48e59fdddde761b03d76c5c8d390311' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_2\\templates\\kadai3_4.html',
      1 => 1597885442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3dcc07c06e22_83645244 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 10) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="kadai3_4/sp.css" rel="stylesheet" media="all" />
    <title>(Android・iPhone)登録ページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 11) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="kadai3_4/mobile.css" rel="stylesheet" media="all" />
    <title>(mobile)登録ページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 12) {?>
    <meta name="viewport" content="width=768,user-scalable=no">
    <link href="kadai3_4/tablet.css" rel="stylesheet" media="all" />
    <title>(Android・iPad)登録ページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 13) {?>
    <meta name="viewport" content="width=width=device-width">
    <link href="kadai3_4/pc.css" rel="stylesheet" media="all" />
    <title>(PC)登録ページ</title>
    <?php }?>
  </head>

  <body>
    <h3>ユーザー登録</h3>

    <form method="post" action="sent.php">
      <div class="form-item">
        名前：<input type="text" name="name">
        メールアドレス:<input type="text" name="mail">
        パスワード：<input type="password" name="pass">
        <input type="submit" value="登録">
      </div>
    </form>
  </body>
</html><?php }
}
