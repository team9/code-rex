<div id="query_page">

<?php
require_once('../rx_util.php');

?>

 <style type="text/css">
#query_page{
color : white;
}
.quest_subject {
	float: left;
	}
.quest_stmt {
	/*float: left;*/
	}

.quest_user
	{
	float: left;
	}
.answer_user
	{
	float: left;
	}
.answerquest{
	float: left;
	}
#unanswered{
		float: left;
		padding-right: 10px;
		padding-bottom: 5px;
		width: 400px;
	}
#answered{
		float: left;
		padding-right: 10px;
		padding-bottom: 10px;
		width: 400px;
	}
#queries_all{
		width: 850px;
		height: 500px;
		
		}
</style>
<script type="text/javascript" >
	$(document).ready(function () {
		
		$('#askbutton').click(function () {
	      //alert('question asked!');
	      try{
	      var details = $('textarea[name=details]');
         var qid = $('input[name=qid]');
	      var datastr='details='+encodeURIComponent(details.val())+'&qid='+qid.val();
	      alert('question asked!'+datastr)
	      $.ajax({
			  type: 'POST',
			  url: 'Queries/answerInsert.php',
			  data: datastr,
			  success: function(htmldata) {
			  		alert(htmldata)
				  	$('#update').html('Success');
				  	$('#update').addClass('hightlight');
			  	}
			  	
			});
			}catch(exc){
	   	alert(exc);
	   	}
			return false;
	   });
	   
	 });
</script>
  <?php
  
 $q1="select * from `ask_cse`.`query`";
  $res=mysql_query($q1);
  echo ''.$q2.' '.mysql_error();
  $rarr=mysql_fetch_array($res);
if($rarr) {
   $questions='';
   $ansdQuest='';
   $unansdQuest='';
	 do {  
		$q2="select * from `ask_cse`.`answer` where answer.queryid = ".$rarr['queryid']."";
		$res2=mysql_query($q2);
		//echo ''.$q2.' '.mysql_error();
		$r2=mysql_fetch_array($res2);	
		$questions='';		   
		$questions .= "<br><div class='quest'>";
		$questions .= "<div class='quest_subject'>Question ".$rarr['qid'].":</div>";
	   $questions .= "<div class='quest_user'>".$rarr['userid']." says: </div>";			   
		$questions .= "<div class='quest_stmt'>".$rarr['query']."</div></div>";
		if($r2 ) {

				do {
					$ansdQuest .=$questions;
					$ansdQuest .= "<div class='answer'>";
				   $ansdQuest .= "<div class='answer_user'>Admin says: </div>";
					$ansdQuest .= "<div class='answer_stmt'>".$r2['answer']."</div></div>";
					
				} while($r2=mysql_fetch_array($res2)) ;
				$ansdQuest .="<div ><form action='Queries/answerInsert.php' method='post'><div><textarea name=\"details\" class=\"answerquest\" cols=\"45\" rows=\"2\"></textarea>";
				$ansdQuest .="<input type=\"hidden\" name=\"queryid\" value=\"".$rarr['queryid']."\" /></div>";
				$ansdQuest .="<div><input type=\"submit\" name=\"button\" value=\"Clarify\" /></div></form></div>";
		 }else {
		 	$unansdQuest .=$questions;
 	 		$unansdQuest .="<div ><form action='Queries/answerInsert.php' method='post'><div><textarea name=\"details\" class=\"answerquest\" cols=\"45\" rows=\"2\"></textarea>";
			$unansdQuest .="<input type=\"hidden\" name=\"queryid\" value=\"".$rarr['queryid']."\" /></div>";
			$unansdQuest .="<div><input type=\"submit\" name=\"button\" value=\"Clarify\" /></div></form></div>";
		 }

	 } while($rarr=mysql_fetch_array($res)) ;
	 ?> 
	 <div id="queries_all">
		 <div id="unanswered"><?php
		 echo $unansdQuest;
		 ?></div>
		 <div id="answered">
		 <?php
		 echo $ansdQuest;
		 ?>
		 </div>
	 </div>
<!--<div ><form action="answerInsert.php" method="post"><div><textarea name="details" class="answerquest" cols="45" rows="2"></textarea>
					<input type="hidden" name="queryid" value="7" /></div>
					<div><input type='submit' name='button' value='Clarify' /></div></form></div>-->
	 	 <?php
	 
	}else {
		echo "No queries have been Asked.";
		}
   ?>  

</div>