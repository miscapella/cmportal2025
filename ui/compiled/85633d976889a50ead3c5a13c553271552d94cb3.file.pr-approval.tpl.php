<?php /* Smarty version Smarty-3.1.13, created on 2024-09-13 16:29:56
         compiled from "ui\theme\softhash\pr-approval.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106947702566e40614365c92-11492365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85633d976889a50ead3c5a13c553271552d94cb3' => 
    array (
      0 => 'ui\\theme\\softhash\\pr-approval.tpl',
      1 => 1726203434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106947702566e40614365c92-11492365',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_title' => 0,
    'app_url' => 0,
    '_theme' => 0,
    'notify' => 0,
    '_url' => 0,
    'uid' => 0,
    'token' => 0,
    'xfooter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66e40614d12b83_90433169',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66e40614d12b83_90433169')) {function content_66e40614d12b83_90433169($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Approval Form - <?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon.ico" type="image/x-icon" />
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap5.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <!-- ionicons -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/logincss.css" rel="stylesheet">
</head>

<body class="overflow-hidden light-background" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/wallpaper.jpg);background-position: center;background-size: cover;background-repeat: no-repeat;" style="display:flex;align-items:center;">
<div class="container d-flex flex-row justify-content-center align-items-center h-100 w-100">
<div class="row col d-flex flex-row justify-content-center align-items-center rounded-3" style="max-width:500px;background-color: rgba(255, 255, 255, 0.9);">
            <div class="login-brand text-center mt-4 mb-4">
                <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/system/logo.png" alt="Logo">
            </div>
            <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
                <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

            <?php }?>
            <!-- <form class="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
form-api/comment-form-post/"> -->
                <input type="hidden" name="_url" id="_url" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
">
                <input type="hidden" id="uid" value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
">
                <input type="hidden" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                <div class="form-group m-bottom-md">
                    <textarea name="isi" id="isi" rows="5" style="width: 100%;" placeholder="Pesan"></textarea>
                </div>
                <div class="p-top-sm">
                    <button class="btn btn-success block full-width" name="approve" id="approve" type="button">Approve</button>
                </div>
                <div class="p-top-sm m-bottom-md">
                    <button class="btn btn-danger block full-width" name="reject" id="reject" type="button">Reject</button>
                </div>
            <!-- </form> -->
        </div><!-- ./sign-in-inner -->
    </div><!-- ./sign-in-wrapper -->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-1.10.2.js"></script>
<!-- Bootstrap -->
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/bootstrap5.min.js"></script>
<?php if (isset($_smarty_tpl->tpl_vars['xfooter']->value)){?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }?>
</body>
</html>
<?php }} ?>