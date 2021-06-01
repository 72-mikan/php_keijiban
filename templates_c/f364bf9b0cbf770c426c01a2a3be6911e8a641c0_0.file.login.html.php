<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-13 17:44:13
  from 'C:\xampp\htdocs\kadai4_1\templates\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f34fd5d9ab476_40885918',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f364bf9b0cbf770c426c01a2a3be6911e8a641c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_1\\templates\\login.html',
      1 => 1597307918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f34fd5d9ab476_40885918 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charaset="utf-8">
    <title>ログインページ</title>
  </head>

  <body>
    <?php if ($_smarty_tpl->tpl_vars['flag']->value == 11) {?>
      <h3>簡易掲示板へのログイン</h3>
  
      <form action="" method="post">
        <div>
          パスワード：<input type="password" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['cookie_pass']->value;?>
" >
          ID:<input type="text" name="id" value="<?php echo $_smarty_tpl->tpl_vars['cookie_id']->value;?>
">
          <input type="submit" value="ログイン">
        </div>
      </form>

      <a href="templates/kadai3_4.html">登録はここから</a>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['flag']->value == 10) {?>
      <h3>ログイン失敗</h3>
      <div>ユーザー登録が完了していない、</div>
      <div>パスワードまたはIDが違います。</div>
    <?php }?>
    
  </body>
</html><?php }
}
