<?php
require_once('rx_util.php');
define('FACEBOOK_APP_ID', '255931397802922');
define('FACEBOOK_SECRET', 'e8f142f75e0680c498bc846fa362fd80');

function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    error_log('Unknown algorithm. Expected HMAC-SHA256');
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
}

if ($_REQUEST) {
  echo '<p>signed_request contents:</p>';
  $response = parse_signed_request($_REQUEST['signed_request'], 
                                   FACEBOOK_SECRET);
                                   
  $birthday= substr_replace($response['registration']['birthday'], '-', 2, 1); 
  $birthday=substr_replace($birthday, '-', 5, 1);                               
  $query="INSERT INTO `ask_cse`.`user` (`uid` ,`username` ,`birthday` ,`gender` ,`currentloc` ,`email` ,`lang`)
   VALUES 
   ('".$response["user_id"]."','".$response['registration']['name']."','".$birthday."','".$response['registration']['gender']."','"
   .$response['registration']['location']['name'].",".$response['registration']['location']['id']."','"
   .$response['registration']['email']."','".$response['registration']['prog_language']."')";
  if(mysql_query($query)){
  		echo "Successfully added to database";
  } else {
  	 echo "Some error".mysql_error();  	
  }
  //echo $query;
  //echo 'My name is '.$response['registration']['name'];
  header( 'Location: index.php' ) ;	
  echo '<pre>';
  print_r($response);
  echo '</pre>';
} else {
  echo '$_REQUEST is empty';
}
mysql_close($con);
?>