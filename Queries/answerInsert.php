<?php
require_once('../rx_util.php');
$answer = $_POST['details'];
$query = $_POST['queryid'];
echo ':'.$answer.$query.":";
if($answer!=''&&$query != '') {
//$user = $_POST['id'];
  $q1="insert into ask_cse.answer values(NULL,'".$answer."','".$query."')";
  mysql_query($q1);
  echo 'ok'.$q1.mysql_error();
  //echo "<script type='text/javascript'> window.location='submit.html'</script>";
  }
?>