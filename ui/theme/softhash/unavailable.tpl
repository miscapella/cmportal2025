<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>CMPortal</title>
    <link rel="shortcut icon" href="{$app_url}sysfrm/uploads/icon/favicon.ico" type="image/x-icon" />
	<link href="{$_theme}/css/unavailable.css" rel="Stylesheet" /> 
  <!--<link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />-->
    <style>
        pre {
            margin-bottom: 10px;
            padding-left: 10px;
            border-left: 3px #DDD solid;
        }
    </style>
</head>
<body scroll="no" style="overflow:hidden">
	<div id="floatdiv" style="  
        position:absolute;  
        width:250px;height:55px;top:5px;right:10px;  
        padding:2px;background:#FFFFFF;  
        border:2px solid #2266AA;text-align:center;
        z-index:100;">
		
		<div id="countdown-2"></div>
		<div style='margin-top:5px;'><a href="{$_url}login" style="color:red;text-decoration:none"><b>Kembali ke Form Login</b></a></div>
    </div>
	<div id="container">
		<div style="top:750px;position:absolute;left:50%">
			<img class="imgrotate" src="{$_theme}/img/globe.png">
		</div>
	</div>
<input type="hidden" id="waktu" name="waktu" value={$wkt}>
<input type="hidden" id="_url" name="_url" value="{$_url}">
<script src="{$_theme}/js/jquery-1.10.2.js"></script>
<script src="{$_theme}/js/bootstrap.min.js"></script>
<script src="{$_theme}/js/floating-1.12.js"></script>
<script src="{$_theme}/js/jquery.time-to.js"></script>
<script>
$(document).ready(function () {
	$('#floatdiv').addFloating(  
	{  
			// Represents distance from left or right browser window  
			// border depending upon property used. Only one should be  
			// specified.  
			targetLeft: 10,  
			//targetRight: 10,  
  
			// Represents distance from top or bottom browser window  
			// border depending upon property used. Only one should be  
			// specified.  
			//targetTop: 10,  
			// targetBottom: 0,  
  
			// Uncomment one of those if you need centering on  
			// X- or Y- axis.  
			//centerX: true,  
			// centerY: true,  
  
			// Remove this one if you don't want snap effect  
			snap: true  
	});
	var selisih = $('#waktu').val();
    var _url = $("#_url").val();
//	var date = getRelativeDate(0,3,0);
<!-- $('#countdown-2').timeTo({ -->
    <!-- time: '00:03:00', -->
    <!-- displayDays: 0, -->
    <!-- theme: "black", -->
    <!-- displayCaptions: false, -->
    <!-- fontSize: 30, -->
    <!-- captionSize: 14, -->
    <!-- lang: 'en' -->
<!-- });  -->
		if(selisih >0) {
			$('#countdown-2').timeTo(parseInt(selisih), function() {
				$.ajax({
					url: _url + 'unavailable/giveon/',
					type: 'POST',
					cache: false,
		//			dataType: 'json',
					processData: false, // Don't process the files
					contentType: false, // Set content type to false as jQuery will tell the server its a query string request
					success: function(data, textStatus, jqXHR)
					{
						window.location = _url + 'login';
					}
				});
			});
		}

        function getRelativeDate(days, hours, minutes) {
            //var d = new Date(Date.now() + 60000 /* milisec */ * 60  /* 24 */* hours /*  days /* days */);
            var d = new Date(Date.now() + 60000 /* milisec */ * 60 /* minutes */  * hours /* * days /* days */);

            <!-- d.setHours(hours || 0); -->
            <!-- d.setMinutes(minutes || 0); -->
            <!-- d.setSeconds(0); -->

            return d;
        }
});
</script>
</body>
</html>
