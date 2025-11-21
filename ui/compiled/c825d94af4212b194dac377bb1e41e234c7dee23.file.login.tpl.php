<?php /* Smarty version Smarty-3.1.13, created on 2025-04-29 10:43:31
         compiled from "ui\theme\softhash\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20764373136335405dbb6fd9-77304284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c825d94af4212b194dac377bb1e41e234c7dee23' => 
    array (
      0 => 'ui\\theme\\softhash\\login.tpl',
      1 => 1745898141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20764373136335405dbb6fd9-77304284',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6335405dc05871_59193277',
  'variables' => 
  array (
    '_L' => 0,
    '_title' => 0,
    'app_url' => 0,
    '_theme' => 0,
    '_c' => 0,
    'notify' => 0,
    '_url' => 0,
    'direct' => 0,
    'company' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6335405dc05871_59193277')) {function content_6335405dc05871_59193277($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['_L']->value['Login'];?>
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

    <?php if ($_smarty_tpl->tpl_vars['_c']->value['rtl']=='1'){?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style-rtl.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <?php }?>


</head>

<body class="overflow-hidden light-background" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/img/wallpaper.jpg);background-position: center;background-size: cover;background-repeat: no-repeat;display:flex;align-items:center">
<div class="container d-flex flex-row justify-content-center align-items-center h-100 w-100">
<div class="row col d-flex flex-row justify-content-center align-items-center rounded-3" style="max-width:500px;background-color: rgba(255, 255, 255, 0.9);">
            <div class="login-brand text-center mt-4 mb-4">
                <img class="logo responsive" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/system/logo.png" alt="Logo">

            </div>
            <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
                <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

            <?php }?>
            <form class="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/post/">
                <!-- <h1>testes <?php echo $_smarty_tpl->tpl_vars['direct']->value;?>
</h1> -->
                <div class="input-group mt-4">
                    <span class="input-group-text bg-primary">
                        <i class="fa fa-user text-white"></i>
                    </span>
                    <input type="text" class="form-control border-primary" id="username" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Address'];?>
" required>
                </div>
            
                <div class="input-group mt-4">
                    <span class="input-group-text bg-primary" style='padding:0.7em'>
                        <i class="fa fa-key text-white"></i>
                    </span>
                    <input type="password" class="form-control border-primary" id="password" name="password" placeholder="Password" required>
                    <span class="input-group-text bg-primary" onclick="togglePassword()" style="cursor: pointer;">
                        <i id="toggleIcon" class="fa fa-eye text-white"></i>
                    </span>
                </div>
                &nbsp;
                <div class="input-group mt-4">
                    <span class="input-group-append bg-primary justify-content-center align-items-center" style='padding:1em'>
						<i class="fa fa-building"></i>
					</span>
					<select name="company" id="company" class="form-control border-primary" autocomplete="off">
						<option value="PT Capella Medan">Pilih Perusahaan</option>
					   <?php echo $_smarty_tpl->tpl_vars['company']->value;?>

					</select>
				</div>

                <div class="m-top-md p-top-sm">

                    <button class="btn btn-success block full-width" name="login" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sign in'];?>
</button>
                </div>
				<div class="m-top-md p-top-sm">
					<div style="width:45%;float:left"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/register/" class="btn btn-warning block" style="font-size:14px"><b>REGISTER</b></a></div>
					<div style="width:45%;float:right" class="mb-4"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/forgot-pw/" class="btn btn-danger block" style="font-size:14px"><b><?php echo $_smarty_tpl->tpl_vars['_L']->value['Forgot password'];?>
</b></a></div>
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
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>

</body>
</html>
<?php }} ?>