<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-13 17:45:58
  from 'C:\xampp\htdocs\kadai4_1\templates\touroku.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f34fdc6e35ed8_92776888',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b075e53a8979ce7f59ebd5403d06ae85ea72b2e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_1\\templates\\touroku.html',
      1 => 1597306775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f34fdc6e35ed8_92776888 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ユーザー登録確認</title>
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
