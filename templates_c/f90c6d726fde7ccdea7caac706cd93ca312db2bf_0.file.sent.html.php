<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-13 17:45:48
  from 'C:\xampp\htdocs\kadai4_1\templates\sent.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f34fdbc5c2998_27926960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f90c6d726fde7ccdea7caac706cd93ca312db2bf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_1\\templates\\sent.html',
      1 => 1597306251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f34fdbc5c2998_27926960 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ユーザー仮登録</title>
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
