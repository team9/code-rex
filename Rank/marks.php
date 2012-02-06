<style>
.container {position:absolute; left:50%; margin-left:-423px;}
.column {position:absolute; border:1px solid #6367F8;}
.a {left:0; width:250px;}
.b {left:250px; width:250px;}
.c {left:500px; width:250px;}
</style>
<?php
  $uid = $_GET['uid'];
  
  require_once('../rx_util.php');



  $q1="select questions.question,questions.mark,submissions.duration,submissions.starttime from ask_cse.questions JOIN ask_cse.submissions on  submissions.qid=questions.qid  where submissions.uid='".$uid."' and submissions.status=1 group by submissions.qid";
  $res1=mysql_query($q1);
//echo $q1.mysql_error();
  $r1=mysql_fetch_array($res1);

 $q0="select * from `ask_cse`.`user`  where uid=".$uid;
  $res0=mysql_query($q0);
  $userdetails=mysql_fetch_array($res0);  

  if($r1) {
?>

  
 <div class="container">
  <h1><?php echo $userdetails['username']; ?>'s Scoreboard</h1>
  <div class="column a" id="a" align="center"><b>QUESTION</b></div>
  <div class="column b" id="b" align="center"><b>MARK</b></div>
  <div class="column c" id="c" align="center"><b>SUBMISSION TIME</b></div>
<?php
	 do {
        echo "<br>";
		echo "<div class='column a' id='a' align='center'>".$r1[0]."</div>";
		echo "<div class='column b' id='b' align='center'>".$r1[1]." marks</div>";	
		echo "<div class='column c' id='c' align='center'>".date('D, d M Y H:i:s',$timestamp =($r1[3]+$r1[2]))."</div>";
	 } while($r1=mysql_fetch_array($res1));
   } else {
      echo "<h1>".$userdetails[1]." has not scored any marks!!!</h1>";
   }
 echo"</div>"; 
?>  	