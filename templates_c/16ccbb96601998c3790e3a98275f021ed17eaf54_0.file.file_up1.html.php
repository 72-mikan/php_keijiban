<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-13 17:46:49
  from 'C:\xampp\htdocs\kadai4_1\templates\file_up1.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f34fdf9ba7be4_78233264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16ccbb96601998c3790e3a98275f021ed17eaf54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_1\\templates\\file_up1.html',
      1 => 1597221410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f34fdf9ba7be4_78233264 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ファイルのアップロード</title>
  </head>

  <body>

    <h3>画像・動画のアップロード</h3>
    <form method="post" action="" enctype="multipart/form-data" > 
      <div>
        投稿者名：<input type="text" name="name">
        コメント：<input type="text" name="body">
        パスワード：<input type="password" name="pass">
        <?php if ($_smarty_tpl->tpl_vars['flag']->value == 10) {?>
          (未入力です)
        <?php }?>
        </div><br>

      <div>
        ここでアップロード：
        <input type="hidden" name="MAX_FILE_SIZE" value="$maxsize"  />
        <input type="file" name="upfile" accept=".gif, .jpg, .png, .mp4">
        <input type="submit" value="投稿">
      </div>
    </form>

  </body>
</html><?php }
}
