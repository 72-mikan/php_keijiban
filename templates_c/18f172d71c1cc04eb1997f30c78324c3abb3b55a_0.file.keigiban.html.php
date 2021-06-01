<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-20 10:32:34
  from 'C:\xampp\htdocs\kadai4_2\templates\keigiban.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3dd2b26fe1d9_36051428',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18f172d71c1cc04eb1997f30c78324c3abb3b55a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_2\\templates\\keigiban.html',
      1 => 1597887146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3dd2b26fe1d9_36051428 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 10) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/keigiban/sp.css" rel="stylesheet" media="all" />
    <title>(Android・iPhone)簡易掲示板</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 11) {?>
    <meta name="viewport" content="width=480,user-scalable=no">
    <link href="templates/keigiban/mobile.css" rel="stylesheet" media="all" />
    <title>(mobile)簡易掲示板</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 12) {?>
    <meta name="viewport" content="width=768,user-scalable=no">
    <link href="templates/keigiban/tablet.css" rel="stylesheet" media="all" />
    <title>(Android・iPad)簡易掲示板</title>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['design']->value == 13) {?>
    <meta name="viewport" content="width=width=device-width">
    <link href="templates/keigiban/pc.css" rel="stylesheet" media="all" />
    <title>(PC)簡易掲示板</title>
    <?php }?>
  </head>

  <body>
    <h3>簡易掲示板 こんにちは<?php echo $_smarty_tpl->tpl_vars['session_name']->value;?>
さん</h3>

    <?php if ($_smarty_tpl->tpl_vars['blank']->value == 10) {?>
      <div>(未入力です)</div>
    <?php }?>
    
    <!--フォーム-->
    <form method="post" action="" > 
      <div class="form-item1">名前：<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['session_name']->value;?>
"></div>
      <div class="form-item1">内容：<input type="text" name="body"></div>
      <div class="form-item1">パスワード：<input type="password" name="pass"></div>
      <div><input type="submit" value="投稿"></div>
      
    </form>    

    <form method="post" action="pass.php"> 
      <div class="form-item">
        削除：
        <select name="delete">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id']->value, 'delete_id');
$_smarty_tpl->tpl_vars['delete_id']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['delete_id']->value) {
$_smarty_tpl->tpl_vars['delete_id']->do_else = false;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['delete_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['delete_id']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
        <input type="submit" value="送信">
      </div>
    </form>

    <form method="post" action="pass.php">
      <div class="form-item">
        編集：
        <select name="edit">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id']->value, 'edit_id');
$_smarty_tpl->tpl_vars['edit_id']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['edit_id']->value) {
$_smarty_tpl->tpl_vars['edit_id']->do_else = false;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
        <input type="submit" value="送信">
      </div>
    </form>

    <form method="post" action="file_up1.php"> 
      <div class="form-item">
        画像・動画のアップロード<input type="submit" value="移動">
      </div>
    </form>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contents']->value, 'rows');
$_smarty_tpl->tpl_vars['rows']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
$_smarty_tpl->tpl_vars['rows']->do_else = false;
?>
      <?php if ($_smarty_tpl->tpl_vars['rows']->value['id'] == 0) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['rows']->value['body'];?>
</p>
      <?php } else { ?>
        <p><?php echo $_smarty_tpl->tpl_vars['rows']->value['id'];?>
:<?php echo $_smarty_tpl->tpl_vars['rows']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['rows']->value['body'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rows']->value['time'];?>
)</p>
        <?php if (($_smarty_tpl->tpl_vars['rows']->value['file_pass'] != NULL) || ($_smarty_tpl->tpl_vars['rows']->value['file_type'] != NULL)) {?>
          <?php if (($_smarty_tpl->tpl_vars['rows']->value['file_type'] == "gif") || ($_smarty_tpl->tpl_vars['rows']->value['file_type'] == "jpg") || ($_smarty_tpl->tpl_vars['rows']->value['file_type'] == "png")) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['rows']->value['file_pass'];?>
" width="500" height="500">
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['rows']->value['file_type'] == "mp4") {?>
            <video src="<?php echo $_smarty_tpl->tpl_vars['rows']->value['file_pass'];?>
"  alt="アップロードファイル" controls></video>
          <?php }?>
        <?php }?>
      <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      

  </body>
</html><?php }
}
