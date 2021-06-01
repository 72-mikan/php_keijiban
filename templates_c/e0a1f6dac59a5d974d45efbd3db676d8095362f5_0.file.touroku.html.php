<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-25 10:45:06
  from 'C:\xampp\htdocs\kadai4_3\templates\touroku.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f446d228e2e45_60050808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0a1f6dac59a5d974d45efbd3db676d8095362f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_3\\templates\\touroku.html',
      1 => 1597886412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f446d228e2e45_60050808 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 10) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/touroku/sp.css" rel="stylesheet" media="all" />
    <title>(Android・iPhone)ユーザー登録確認</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 11) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/touroku/mobile.css" rel="stylesheet" media="all" />
    <title>(mobile)ユーザー登録確認</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 12) {?>
    <meta name="viewport" content="width=768,user-scalable=no">
    <link href="templates/touroku/tablet.css" rel="stylesheet" media="all" />
    <title>(Android・iPad)ユーザー登録確認</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 13) {?>
    <meta name="viewport" content="width=width=device-width">
    <link href="templates/touroku/pc.css" rel="stylesheet" media="all" />
    <title>(PC)ユーザー登録確認</title>
    <?php }?>
  </head>
  <body>
     <h3>ユーザー登録情報</h3>
      <p>名前：<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p>
      <p>パスワード：<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
</p>
      <p>ID：<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
</p>
      <p>登録日時：<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</p>

      <a href="login.php">ログインページへ</a>
      
  </body>
</html><?php }
}
