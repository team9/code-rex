<script type="text/javascript">
document.oncontextmenu=function (){alert(''You have to do better than that!!!'');return false;};
    </script>

<style>
#solutionUploadPage {
  color : white;
}
</style>
 <div id="solutionUploadPage"> 
<?php

require_once("../rx_util.php");
if($_POST['qid']&& $user !=0){
   $querystr="Select * from `ask_cse`.`submissions` where qid='".$_POST['qid']."' and uid='".$user."' and status=1";
   $resultofquery =mysql_query($querystr);

   if(!mysql_fetch_array($resultofquery)){
 
   if ($_FILES['code']["name"] && $_FILES['output']["name"]) {
    
	$uid = $user;
	$qid = $_POST['qid'];

	$q2="select * from ask_cse.submissions where qid=".$qid." and uid=".$uid." and ".time()."- starttime <= 240";

    $res2=mysql_query($q2);
    $row=mysql_fetch_array($res2);
	//echo mysql_error();

	$sid = $row["sid"];
	$starttime = $row["starttime"];
	$iid = $row["iid"];
	$duration = time() - $starttime;
	//echo "	starttime:".$starttime."	time:".time()."		Duration:".$duration;
	//echo "	sid:".$sid."	iid:".$iid;
	//echo "Query : ".$q2;
	
	
	
    $fileid = date(d) . "-" . date(m) . "-" . date(Y) . "_" . date(G) . "-" . date(i) . "-" . date(s);

    if (!is_dir("SolutionUploads/$uid/$qid/$sid"))
        mkdir("SolutionUploads/$uid/$qid/$sid", $mode = 0777, $recursive = true);

    $extnsion1 = substr($_FILES["code"]["name"], strpos($_FILES["code"]["name"], ".")+1, strlen($_FILES["code"]["name"]));
    $extnsion2 = substr($_FILES["output"]["name"], strpos($_FILES["output"]["name"], ".")+1, strlen($_FILES["output"]["name"]));
	//echo "		Extension1:".$extnsion1."		Extension2:".$extnsion2;
	
	
	
	
	
	if($duration<=240)
    {
    move_uploaded_file($_FILES['code']['tmp_name'], "SolutionUploads//$uid//$qid//$sid//Code_$fileid.".$extnsion1);
    move_uploaded_file($_FILES['output']['tmp_name'], "SolutionUploads//$uid//$qid//$sid//Output_$fileid.".$extnsion2);

    $right_output = file_get_contents("Outputs//$iid.txt");
    $trial_output = file_get_contents("SolutionUploads//$uid//$qid//$sid//Output_$fileid.$extnsion2");

    $status = 0;
    if (strcmp($right_output, $trial_output) == 0) {
        echo "Output is correct";
        $status = 1;
    } else {
        echo "Output is wrong!";
    }

//echo "r".$right_output." else".$trial_output;

    
    $q2 = "update ask_cse.submissions set duration=".$duration.",status='".$status."' where sid=".$sid;
    $res2 = mysql_query($q2);
	}
	else echo "Time out ! Please download another sample input.";
}else if($_FILES['code']["name"] && $_POST['qid']) {
    
	$uid = $user;
	$qid = $_POST['qid'];

	
	
    $fileid = date(d) . "-" . date(m) . "-" . date(Y) . "_" . date(G) . "-" . date(i) . "-" . date(s);

    if (!is_dir("SolutionUploads/$uid/$qid/"))
        mkdir("SolutionUploads/$uid/$qid/", $mode = 0777, $recursive = true);

    $extnsion1 = substr($_FILES["code"]["name"], strpos($_FILES["code"]["name"], ".")+1, strlen($_FILES["code"]["name"]));
	//echo "		Extension1:".$extnsion1."		Extension2:".$extnsion2;
	

    move_uploaded_file($_FILES['code']['tmp_name'], "SolutionUploads//$uid//$qid//Code_$fileid.".$extnsion1);

   
    $q2 = "insert into ask_cse.submissions values( NULL,'$user','$qid',-1,'".time()."',0,0)";
    $res2 = mysql_query($q2);
	
echo "Successfully uploaded !";
} else if ($_POST['answer']!="" && $_POST['qid']) { 
$q4="select answer,iid from ask_cse.inputs where qid=".$_POST['qid'];
    $res4=mysql_query($q4);
    $row4=mysql_fetch_array($res4);
	echo mysql_error();
    $ans = $row4['answer'];
	
    if(strcmp($_POST['answer'],$ans)==0){
       echo "Right Answer";
       $que1 = "insert into `ask_cse`.`submissions` values (NULL,'$user','".$_POST['qid']."','".$row4['iid']."','".time()."',-1,1)";
       $res = mysql_query($que1);
    }else 
       echo "Wrong Answer";

    //echo "Query: ".$q4;

} else {
    echo 'No Files Selected/Or No Input Given!!!';
}
//echo "Qstn : ". $_POST['qid'];
//echo "ansr : ".$_POST['answer'];
//echo "actual ansr : ".$ans;
}else{
  echo "You have already solved this.";
}
}
?>

</div>			