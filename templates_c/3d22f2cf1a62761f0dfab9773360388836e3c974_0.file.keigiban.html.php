<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-13 17:45:37
  from 'C:\xampp\htdocs\kadai4_1\templates\keigiban.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f34fdb1f35e13_01985444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d22f2cf1a62761f0dfab9773360388836e3c974' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kadai4_1\\templates\\keigiban.html',
      1 => 1597307270,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f34fdb1f35e13_01985444 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>簡易掲示板</title>
  </head>

  <body>
    <h3>簡易掲示板 こんにちは<?php echo $_smarty_tpl->tpl_vars['session_name']->value;?>
さん</h3>
    
    <!--フォーム-->
    <form method="post" action="" > 
      <div class="form-item">
        名前：<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['session_name']->value;?>
">
        内容：<input type="text" name="body">
        パスワード：<input type="password" name="pass">
        <input type="submit" value="投稿">
        <?php if ($_smarty_tpl->tpl_vars['blank']->value == 10) {?>
          (未入力です)
        <?php }?>
      </div>
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
