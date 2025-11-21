<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register - {$_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{$app_url}sysfrm/uploads/icon/favicon.ico" type="image/x-icon" />
    <link href="{$_theme}/css/bootstrap5.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/fa/css/font-awesome.min.css" rel="stylesheet">

    <!-- ionicons -->
    <link href="{$_theme}/css/logincss.css" rel="stylesheet">



</head>

<body class="overflow-hidden light-background" style="background-image: url({$_theme}/img/wallpaper.jpg);background-position: center;background-size: cover;background-repeat: no-repeat;" style="display:flex;align-items:center;">
<input type="hidden" name="_url" id="_url" value="{$_url}">
<div class="container d-flex flex-row justify-content-center align-items-center h-100 w-100">
<div class="row col d-flex flex-row justify-content-center align-items-center rounded-3" style="max-width:500px;background-color: rgba(255, 255, 255, 0.9);">
            <div class="login-brand text-center mt-4 mb-4">
                <img class="logo" src="{$app_url}sysfrm/uploads/system/logo.png" alt="Logo">

            </div>
            {if isset($notify)}
                {$notify}
            {/if}
            <form class="login" method="post" action="{$_url}login/register-post/">
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
                </div>
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="username" name="username" placeholder="{$_L['Email Address']}">
                </div>
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="emp" name="emp" placeholder="Employee Id sesuai HRIS">
                </div>
                <div class="form-group m-bottom-md">
                    <input type="password" class="form-control" id="password" name="password" placeholder="{$_L['Password']}">
                </div>
                <div class="form-group m-bottom-md">
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="{$_L['Confirm Password']}">
                </div>
                <div class="form-group m-bottom-md">
					<select name="department" id="department" class="form-control">
						<option value="">Pilih Unit Usaha</option>
					   {$department}
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
                        <a href="{$_url}login/">{$_L['Back To Login']}</a>

                    </div>


                </div>
            </form>
        </div><!-- ./sign-in-inner -->
    </div><!-- ./sign-in-wrapper -->



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<script src="{$_theme}/js/jquery-1.10.2.js"></script>

<!-- Bootstrap -->
<script src="{$_theme}/js/bootstrap5.min.js"></script>
{if isset($xfooter)}
    {$xfooter}
{/if}
</body>
</html>
