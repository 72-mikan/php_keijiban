<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-25 10:53:11
  from 'C:\xampp\htdocs\kadai4_3\templates\file_up1.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f446f07d2cd49_76510021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c94efca419b80e61e6aa2c6d79e8bc03ecda1270' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_3\\templates\\file_up1.html',
      1 => 1597886295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f446f07d2cd49_76510021 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 10) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/file_up1/sp.css" rel="stylesheet" media="all" />
    <title>(Android・iPhone)ファイルのアップロード</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 11) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/file_up1/mobile.css" rel="stylesheet" media="all" />
    <title>(mobile)ファイルのアップロード</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 12) {?>
    <meta name="viewport" content="width=768,user-scalable=no">
    <link href="templates/file_up1/tablet.css" rel="stylesheet" media="all" />
    <title>(Android・iPad)ファイルのアップロード</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 13) {?>
    <meta name="viewport" content="width=width=device-width">
    <link href="templates/file_up1/pc.css" rel="stylesheet" media="all" />
    <title>(PC)ファイルのアップロード</title>
    <?php }?>
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
