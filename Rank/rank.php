<style>
.container {position:absolute; left:50%; margin-left:-423px;}
.column {position:absolute; border:1px solid #6367F8;}
#a {left:0; width:100px; }
#b {left:100px; width:250px;}
#c {left:350px; width:250px;}
</style>

<?php
	require_once('../rx_util.php');

  //$con = mysql_connect("localhost","at","at");
  //mysql_select_db("rank",$con);	  

  //$q1="SELECT name,sum(mark),user.userid DISTINCT questions.qid FROM user Join (submission,questions) ON (user.userid=submission.userid and questions.qid=submission.qid and submission.output=1) GROUP BY name ORDER BY sum(mark) desc";
  $q1="SELECT username,sum(mark),user.uid FROM ask_cse.user Join (ask_cse.submissions,ask_cse.questions) ON (user.uid=submissions.uid and questions.qid=submissions.qid and submissions.status=1) GROUP BY username ORDER BY sum(mark) desc";
  
  $res=mysql_query($q1);
  //echo $q1.mysql_error();
  $r=mysql_fetch_array($res);
 
  if($r) {
   $rank = 1;
?>
<script type="text/javascript" >
$(document).ready(function () {
	$('.column a').click(function () {
			loadContents($(this).attr("href"));
			return false;
		});
	});
</script>
 <div class="container">
  <h1>Score Updates</h1>
  <div class="column" id="a" align="center"><b>RANK</b></div>
  <div class="column" id="b" align="center"><b>NAME</b></div>
  <div class="column" id="c" align="center"><b>TOTAL MARKS</b></div>
<?php
	 do {
	    echo "<br>";
	    echo "<div class='column' id='a' align='center'>".$rank++."</div>";
		echo "<div class='column' id='b' align='center'><a href='Rank/marks.php?uid=".$r[2]."'>".$r[0]."</a></div>";	
		echo "<div class='column' id='c' align='center'>".$r[1]." marks</div>";
	 }while($r=mysql_fetch_array($res));
   }else {
      echo "<h1>No participant has scored any marks!!!</h1>";
   }
 echo"</div>";   
?>