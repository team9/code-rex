<?php
	require_once('../rx_util.php');
	$uid=$user;
	$qid=$_POST['qid'];
	  	$qery2="select * from ask_cse.submissions where qid=".$qid." and uid=".$uid." and ".time()."- starttime <= 240";
	//$q2="select * from fbapp.submissions where  uid=".$uid;
    $result=mysql_query($qery2);
    $rowar=mysql_fetch_array($result);
	echo mysql_error();
    //$sid = $b[0];
	//$starttime = $b[1];
	//$iid = $b[2];
	$sid = $rowar["sid"];
	$starttime = $rowar["starttime"];
	$iid = $rowar["iid"];
	$duration = time() - $starttime;
	//echo "	starttime:".$starttime."	time:".time()."		Duration:".$duration;
	//echo "	sid:".$sid."	iid:".$iid;
	//echo "Query : ".$qery2;
	if($duration<=240)
    {

      
 ?> <link rel="stylesheet" href="questions/Timer/assets/countdown/jquery.countdown.css" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
        <script src="questions/Timer/assets/countdown/jquery.countdown.js"></script>
 <script>
$(document).ready(function (){
	try{
 $(function(){
	
	var note = $('#note<?php echo $qid; ?>'),
		ts =new Date((<?php echo $starttime+240; ?>)*1000).getTime() ;

 	
	$('#countdown<?php echo $qid; ?>').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			message += "Time remaining : " + minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			note.html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ message);
		}
	});
	
});
}catch(e){
	alert(e);
}
});
 </script>
        <div id="countdown<?php echo $qid; ?>"></div>

		<p id="note<?php echo $qid; ?>"></p><?php
		 } else {
		 	echo "notinprogress";
		 }
		 ?>