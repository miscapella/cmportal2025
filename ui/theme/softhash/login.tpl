<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{$_L['Login']} - {$_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{$app_url}sysfrm/uploads/icon/favicon.ico" type="image/x-icon" />
    <link href="{$_theme}/css/bootstrap5.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    



    <!-- ionicons -->
    <link href="{$_theme}/css/logincss.css" rel="stylesheet">

    {if $_c['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {/if}


</head>

<body class="overflow-hidden light-background" style="background-image: url({$_theme}/img/wallpaper.jpg);background-position: center;background-size: cover;background-repeat: no-repeat;display:flex;align-items:center">
<div class="container d-flex flex-row justify-content-center align-items-center h-100 w-100">
<div class="row col d-flex flex-row justify-content-center align-items-center rounded-3" style="max-width:500px;background-color: rgba(255, 255, 255, 0.9);">
            <div class="login-brand text-center mt-4 mb-4">
                <img class="logo responsive" src="{$app_url}sysfrm/uploads/system/logo.png" alt="Logo">

            </div>
            {if isset($notify)}
                {$notify}
            {/if}
            <form class="login" method="post" action="{$_url}login/post/">
                <!-- <h1>testes {$direct}</h1> -->
                <div class="input-group mt-4">
                    <span class="input-group-text bg-primary">
                        <i class="fa fa-user text-white"></i>
                    </span>
                    <input type="text" class="form-control border-primary" id="username" name="username" placeholder="{$_L['Email Address']}" required>
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
					   {$company}
					</select>
				</div>

                <div class="m-top-md p-top-sm">

                    <button class="btn btn-success block full-width" name="login" type="submit">{$_L['Sign in']}</button>
                </div>
				<div class="m-top-md p-top-sm">
					<div style="width:45%;float:left"><a href="{$_url}login/register/" class="btn btn-warning block" style="font-size:14px"><b>REGISTER</b></a></div>
					<div style="width:45%;float:right" class="mb-4"><a href="{$_url}login/forgot-pw/" class="btn btn-danger block" style="font-size:14px"><b>{$_L['Forgot password']}</b></a></div>
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
