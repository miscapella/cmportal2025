<?php /* Smarty version Smarty-3.1.13, created on 2025-11-19 16:08:31
         compiled from "ui\theme\softhash\forgot-pw.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1109918383630f193d4c1861-65841092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f2483d74ebb456f3288346efe0341ec4a3ab528' => 
    array (
      0 => 'ui\\theme\\softhash\\forgot-pw.tpl',
      1 => 1763542734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1109918383630f193d4c1861-65841092',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_630f193d5098b7_33111871',
  'variables' => 
  array (
    '_L' => 0,
    '_title' => 0,
    'app_url' => 0,
    '_theme' => 0,
    'notify' => 0,
    '_url' => 0,
    'captcha_question' => 0,
    'captcha_hash' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_630f193d5098b7_33111871')) {function content_630f193d5098b7_33111871($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reset Password'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
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
            <form class="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/forgot-pw-post/">
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Address'];?>
">
                </div>

                <!-- CAPTCHA -->
                <div class="form-group m-bottom-md">
                    <label class="form-label" style="font-size: 14px; margin-bottom: 8px;">Verifikasi Keamanan:</label>
                    <div class="row g-2">
                        <div class="col-8">
                            <div class="captcha-question p-3 bg-light border rounded text-center" style="font-size: 16px; font-weight: bold; color: #333; border: 2px solid #dee2e6;">
                                <?php echo $_smarty_tpl->tpl_vars['captcha_question']->value;?>

                            </div>
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" id="captcha" name="captcha" placeholder="Jawaban" required style="font-size: 16px; text-align: center;">
                        </div>
                    </div>
                    <small class="form-text text-muted" style="font-size: 12px;">Selesaikan perhitungan di atas untuk melanjutkan</small>
                    <input type="hidden" name="captcha_hash" value="<?php echo $_smarty_tpl->tpl_vars['captcha_hash']->value;?>
">
                </div>

                <div class="m-top-md p-top-sm">

                    <button class="btn btn-success block full-width" name="login" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reset Password'];?>
</button>
                </div>

                <div class="m-top-md p-top-sm">
                    <div class="font-12 text-center m-bottom-xs">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Back To Login'];?>
</a>

                    </div>


                </div>
            </form>
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

<script>
$(document).ready(function() {
    // Form validation
    $('form.login').on('submit', function(e) {
        var username = $('#username').val().trim();
        var captcha = $('#captcha').val().trim();
        
        if (username === '') {
            alert('Silakan masukkan alamat email Anda.');
            $('#username').focus();
            e.preventDefault();
            return false;
        }
        
        if (captcha === '' || captcha === null) {
            alert('Silakan selesaikan verifikasi keamanan.');
            $('#captcha').focus();
            e.preventDefault();
            return false;
        }
        
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(username)) {
            alert('Format email tidak valid.');
            $('#username').focus();
            e.preventDefault();
            return false;
        }
    });
    
    // Auto-focus on captcha after email is entered
    $('#username').on('blur', function() {
        if ($(this).val().trim() !== '') {
            $('#captcha').focus();
        }
    });
});
</script>


</body>
</html>
<?php }} ?>