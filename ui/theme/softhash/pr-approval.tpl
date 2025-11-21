<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Approval Form - {$_title}</title>
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
            <!-- <form class="login" method="post" action="{$_url}form-api/comment-form-post/"> -->
                <input type="hidden" name="_url" id="_url" value="{$_url}">
                <input type="hidden" id="uid" value="{$uid}">
                <input type="hidden" id="token" value="{$token}">
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
<script src="{$_theme}/js/jquery-1.10.2.js"></script>
<!-- Bootstrap -->
<script src="{$_theme}/js/bootstrap5.min.js"></script>
{if isset($xfooter)}
    {$xfooter}
{/if}
</body>
</html>
