<?php
require_once( 'fb/facebook.php');

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '255931397802922',
  'secret' => 'e8f142f75e0680c498bc846fa362fd80',
));

$user = $facebook->getUser();

/*function rx_logEvent($event,$con) {
	$facebook = new Facebook(array(
  'appId'  => '255931397802922',
  'secret' => 'e8f142f75e0680c498bc846fa362fd80',
	));
	$user = $facebook->getUser();
	
	$query="INSERT INTO  `ask_cse`.`session` (`id` ,`time` ,`ip` ,`uid` ,`event`)VALUES (NULL , CURRENT_TIMESTAMP ,  '".$_SERVER['REMOTE_ADDR']."',  '".$user."',  '".$event."')";
	mysql_query($query, $con);
	//echo "Some error ".$user.' '.mysql_error();
	return;
}*/

function rx_getDbConn() {
	$con = mysql_connect("localhost","csehi","passwd");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  return $con;
}
  
$con=rx_getDbConn();
// Get User ID

 $q0="select * from `ask_cse`.`user`  where uid=".$user;
  $res0=mysql_query($q0);
  $userdetails=mysql_fetch_array($res0);	
 // echo "UserName :".$userdetails['username'];
 // echo $q0;

?>
