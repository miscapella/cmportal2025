<?php /* Smarty version Smarty-3.1.13, created on 2023-12-20 16:22:26
         compiled from "ui\theme\softhash\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9409025763633abe30bd85-86394305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0aae0fcfe09dfa1602fcab369ef05d74ee502bd0' => 
    array (
      0 => 'ui\\theme\\softhash\\register.tpl',
      1 => 1701837327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9409025763633abe30bd85-86394305',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63633abe39d6d0_42352666',
  'variables' => 
  array (
    '_title' => 0,
    'app_url' => 0,
    '_theme' => 0,
    '_url' => 0,
    'notify' => 0,
    '_L' => 0,
    'department' => 0,
    'xfooter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63633abe39d6d0_42352666')) {function content_63633abe39d6d0_42352666($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register - <?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
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
<input type="hidden" name="_url" id="_url" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
">
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
login/register-post/">
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
                </div>
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Address'];?>
">
                </div>
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="emp" name="emp" placeholder="Employee Id sesuai HRIS">
                </div>
                <div class="form-group m-bottom-md">
                    <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
">
                </div>
                <div class="form-group m-bottom-md">
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm Password'];?>
">
                </div>
                <div class="form-group m-bottom-md">
					<select name="department" id="department" class="form-control">
						<option value="">Pilih Unit Usaha</option>
					   <?php echo $_smarty_tpl->tpl_vars['department']->value;?>

					</select>
                </div>
                <div class="form-group m-bottom-md ">
                    <input type="text" class="form-control" id="atasan" name="atasan" placeholder="Atasan" style="background-color: white" readonly>
                </div>


                <div class="m-top-md p-top-sm">

                    <button class="btn btn-success block full-width" name="login" type="submit">Register</button>
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
<?php if (isset($_smarty_tpl->tpl_vars['xfooter']->value)){?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }?>
</body>
</html>
<?php }} ?>