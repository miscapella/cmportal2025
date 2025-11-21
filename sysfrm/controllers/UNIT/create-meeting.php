<?php
include('config.php');
include('api.php');
$arr['topic']='Test by miro';
$arr['start_date']='Test by miro';
$arr['duration']='Test by miro';
$arr['password']='Test by miro';
$arr['type']='';
$result=createMeeting($arr);
echo '<pre>';
print_r($result);

?>