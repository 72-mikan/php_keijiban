<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-20 10:07:08
  from 'C:\xampp\htdocs\kadai4_2\templates\touroku.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3dccbc41ecc6_88032923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9988f46875511c620057be75d4a76dec4c8f31dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_2\\templates\\touroku.html',
      1 => 1597728895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3dccbc41ecc6_88032923 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 10) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="/touroku/sp.css" rel="stylesheet" media="all" />
    <title>(Android・iPhone)ユーザー登録確認</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 11) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="/touroku/mobile.css" rel="stylesheet" media="all" />
    <title>(mobile)ユーザー登録確認</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 12) {?>
    <meta name="viewport" content="width=768,user-scalable=no">
    <link href="/touroku/tablet.css" rel="stylesheet" media="all" />
    <title>(Android・iPad)ユーザー登録確認</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 13) {?>
    <meta name="viewport" content="width=width=device-width">
    <link href="/touroku/pc.css" rel="stylesheet" media="all" />
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
