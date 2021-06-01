<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-25 10:53:01
  from 'C:\xampp\htdocs\kadai4_3\templates\pass.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f446efd0b80a9_38543709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '742a367cd3cf104520a256d2e503a9a300720151' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_3\\templates\\pass.html',
      1 => 1597886365,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f446efd0b80a9_38543709 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 10) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/pass/sp.css" rel="stylesheet" media="all" />
    <title>(Android・iPhone)</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 11) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/pass/mobile.css" rel="stylesheet" media="all" />
    <title>(mobile)</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 12) {?>
    <meta name="viewport" content="width=768,user-scalable=no">
    <link href="templates/pass/tablet.css" rel="stylesheet" media="all" />
    <title>(Android・iPad)</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 13) {?>
    <meta name="viewport" content="width=width=device-width">
    <link href="templates/pass/pc.css" rel="stylesheet" media="all" />
    <title>(PC)</title>
    <?php }?>
  </head>

  <body>
    <!--削除番号のパスワード入力-->
    <?php if (!empty($_POST['delete'])) {?>
    <h3>パスワードを入力してくさい：削除</h3>
    <form method="post" action="">
      <input type="password" name="delete_pass">
      <input type="hidden" name="delete_num1" value="<?php echo $_smarty_tpl->tpl_vars['delete_num']->value;?>
">
      <input type="submit" value="送信">
    </form>
    <?php }?>

    <!--編集番号のパスワード入力-->
    <?php if (!empty($_POST['edit'])) {?>
    <h3>パスワードを入力してください：編集</h3>
    <form method="post" action="">
      <input type="password" name="edit_pass">
      <input type="hidden" name="edit_num1" value="<?php echo $_smarty_tpl->tpl_vars['edit_num']->value;?>
">
      <input type="submit" value="送信">
    </form>
    <?php }?>

    <!--削除選択フォーム-->
    <?php if ($_smarty_tpl->tpl_vars['delete_pass']->value == 10) {?>
    <h3>本当に削除してもよろしいですか？</h3>
    <form method="post" action="">
      <input type="radio" name="delete_select" value="10" checked="checked"/>Yes
      <input type="radio" name="delete_select" value="11"/>No
      <input type="hidden" name="delete_num2" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
      <input type="submit" value="送信">
    </form>
    <?php }?>

    <!--編集選択フォーム-->
    <?php if ($_smarty_tpl->tpl_vars['edit_pass']->value == 10) {?>
    <h3>編集してください</h3>
    <form method="post" action="" enctype="multipart/form-data">
      <div>
        名前：<input type="text" name="edit_name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
        内容：<input type="text" name="edit_text" value="<?php echo $_smarty_tpl->tpl_vars['text']->value;?>
">
        パスワード：<input type="password" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['pass_word']->value;?>
">
        <?php if ($_smarty_tpl->tpl_vars['flag']->value == 10) {?>
          (未入力です)
        <?php }?>
        <input type="hidden" name="edit_num2" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
      </div>
      <div>
        ここでアップロード：
        <input type="hidden" name="MAX_FILE_SIZE" value="$maxsize"  />
        <input type="file" name="upfile" accept=".gif, .jpg, .png, .mp4">
        <input type="submit" value="投稿">
      </div>
    </form>
    <?php }?>

    <!--パスワード不一致時-->
    <?php if ($_smarty_tpl->tpl_vars['delete_pass']->value == 11 || $_smarty_tpl->tpl_vars['edit_pass']->value == 11) {?>
    <h3>パスワードが間違っています</h3>
    <a href="keigiban.php">掲示板ページへ</a>
    <?php }?>

    <!--削除選択フォーム-->
    <?php if ($_smarty_tpl->tpl_vars['edit_pass']->value == 12) {?>
    <h3>ファイルアップロードが不正、または、ファイルがアップロードされていません。</h3>
    <p>ファイルなしの状態でアップロードしますか？</p>
    <form method="post" action="">
      <input type="radio" name="edit_select" value="10" checked="checked"/>Yes
      <input type="radio" name="edit_select" value="11"/>No
      <input type="hidden" name="edit_num3" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
      <input type="hidden" name="edit_name2" value="<?php echo $_smarty_tpl->tpl_vars['edit_name2']->value;?>
">
      <input type="hidden" name="edit_text2" value="<?php echo $_smarty_tpl->tpl_vars['edit_text2']->value;?>
">
      <input type="hidden" name="edit_pass2" value="<?php echo $_smarty_tpl->tpl_vars['edit_pass2']->value;?>
">
      <input type="hidden" name="file_name" value="<?php echo $_smarty_tpl->tpl_vars['file_name']->value;?>
">
      <input type="submit" value="送信">
    </form>
    <?php }?>
  
  </body>
</html><?php }
}
