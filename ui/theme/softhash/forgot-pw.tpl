<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{$_L['Reset Password']} - {$_title}</title>
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
<div class="container d-flex flex-row justify-content-center align-items-center h-100 w-100">
<div class="row col d-flex flex-row justify-content-center align-items-center rounded-3" style="max-width:500px;background-color: rgba(255, 255, 255, 0.9);">
            <div class="login-brand text-center mt-4 mb-4">
                <img class="logo" src="{$app_url}sysfrm/uploads/system/logo.png" alt="Logo">

            </div>
            {if isset($notify)}
                {$notify}
            {/if}
            <form class="login" method="post" action="{$_url}login/forgot-pw-post/">
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="username" name="username" placeholder="{$_L['Email Address']}">
                </div>

                <!-- CAPTCHA -->
                <div class="form-group m-bottom-md">
                    <label class="form-label" style="font-size: 14px; margin-bottom: 8px;">Verifikasi Keamanan:</label>
                    <div class="row g-2">
                        <div class="col-8">
                            <div class="captcha-question p-3 bg-light border rounded text-center" style="font-size: 16px; font-weight: bold; color: #333; border: 2px solid #dee2e6;">
                                {$captcha_question}
                            </div>
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" id="captcha" name="captcha" placeholder="Jawaban" required style="font-size: 16px; text-align: center;">
                        </div>
                    </div>
                    <small class="form-text text-muted" style="font-size: 12px;">Selesaikan perhitungan di atas untuk melanjutkan</small>
                    <input type="hidden" name="captcha_hash" value="{$captcha_hash}">
                </div>

                <div class="m-top-md p-top-sm">

                    <button class="btn btn-success block full-width" name="login" type="submit">{$_L['Reset Password']}</button>
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
