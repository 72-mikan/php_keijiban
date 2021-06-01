<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-25 10:43:46
  from 'C:\xampp\htdocs\kadai4_3\templates\sent.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f446cd2ccf468_54511785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07be111edf970f52d59305b6a80f7c19c39f4520' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_3\\templates\\sent.html',
      1 => 1597886382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f446cd2ccf468_54511785 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 10) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/sent/sp.css" rel="stylesheet" media="all" />
    <title>(Android・iPhone)ユーザー登録ページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 11) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/sent/mobile.css" rel="stylesheet" media="all" />
    <title>(mobile)ユーザー登録ページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 12) {?>
    <meta name="viewport" content="width=768,user-scalable=no">
    <link href="templates/sent/tablet.css" rel="stylesheet" media="all" />
    <title>(Android・iPad)ユーザー登録ページ</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 13) {?>
    <meta name="viewport" content="width=width=device-width">
    <link href="templates/sent/pc.css" rel="stylesheet" media="all" />
    <title>(PC)ユーザー登録ページ</title>
    <?php }?>
  </head>
  <body>
    <?php if ($_smarty_tpl->tpl_vars['flag']->value == 10) {?>
      <h3>登録失敗</h3>
      <div>名前、メールアドレス、パスワードを正しく入力してください。</div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['flag']->value == 11) {?>
      <h3>ユーザー仮登録</h3>
      <p>ユーザー登録用のメールアドレスを送信しました。</p>
      <p>メールアドレスのURLから登録ページで登録を行ってください。</p>

      <h3>ユーザー登録情報</h3>
      <p>名前：<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p>
      <p>パスワード：<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
</p>
      <p>ID：<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</p>
      <p>登録日時：<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</p>

    <?php }?>
  </body>
</html><?php }
}
