<?php
require_once('../rx_util.php');
$query = $_POST['details'];
$qid = $_POST['qid'];
//echo ':'.$qid.$query.":";
if($qid!=''&&$query != '') {
//$user = $_POST['id'];
  $q1="insert into ask_cse.query values(NULL,'".$user."','".$query."',".$qid.")";
  mysql_query($q1);
  //echo 'ok'.$q1.mysql_error();
  //echo "<script type='text/javascript'> window.location='submit.html'</script>";
  }
?>