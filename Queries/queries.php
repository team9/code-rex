<style>
#queryViewPage {
  color : white;
}

.text_col_wht {
  color : white;
}

</style>


<div id="queryViewPage">
<?php
/*
  error_reporting(0);
  session_start();
  $user=$_SESSION['userid'];
*/
require_once('../rx_util.php');
?>       
  
  <p>
  <?php
	
	
  $qid=$_POST['qid'];
  
   echo "<script >	\$(function() {\$( \"button, input:submit\", \".demo\" ).button();});</script>";
	echo "<button id='ask_".$qid."' onclick='backToQuestion(\"".$qid."\")'>Back</button>";
	
  $q1="select userid,query,queryid from `ask_cse`.`query` where qid=".$qid."";
  $res=mysql_query($q1);
  //echo ''.$q2.' '.mysql_error();
  $rarr=mysql_fetch_array($res);
if($rarr) {
	
  ?>
  <table class='text_col_wht'>
   <tr>
     <td width="140" align='center' colspan="2" ><strong> Questions </strong></td>
   </tr>
   <?php
	 do {  
	 $q2="select answer from `ask_cse`.`answer` where answer.queryid = ".$rarr['queryid']."";
	$res2=mysql_query($q2);
	//echo ''.$q2.' '.mysql_error();
	$r2=mysql_fetch_array($res2);
        
	if($r2 ) {
             $qgtusr="select username from `ask_cse`.`user`  where uid=".$rarr['userid'];
             $resgtusr=mysql_query($qgtusr);
             $userdetailsgtusr=mysql_fetch_array($resgtusr);

		   echo "<tr class='quest'>";
		   echo "<td  class='text_col_wht'>".$userdetailsgtusr['username']." says: </td>";
			echo "<td  class='text_col_wht'>".$rarr['query']."</td></tr>";
			do {
				echo "<tr class='answer'>";
			   echo "<td class='text_col_wht' >Admin says: </td>";
				echo "<td  class='text_col_wht'>".$r2['answer']."</tr>";
			} while($r2=mysql_fetch_array($res2)) ;
	   	}

	 } while($rarr=mysql_fetch_array($res)) ;
	 ?>   </table>
	 	 <?php
	 
	}else {
		echo "No queries have been answered.";
		}
   ?>  
	 <style type="text/css">
	 .hightlight {
	 	font-weight: lighter;
		font-size: 18px;
	 }

	</style>
<script type="text/javascript" src="../jquery.js"></script>
<script type = "text/javascript">

	$(document).ready(function () {
		
		$('#askbutton_<?php echo $qid; ?>').click(function () {
	      //alert('question asked!');
	      try{
	      var details = $('textarea[name=details]');
         var qid = $('input[name=qid]');
	      var datastr='details='+encodeURIComponent(details.val())+'&qid=<?php echo $qid; ?>';
	      //alert('question asked!'+datastr)
	      $.ajax({
			  type: 'POST',
			  url: 'Queries/insertdb.php',
			  data: datastr,
			  success: function(htmldata) {
			  		//alert(htmldata)
				  	$('#update_<?php echo $qid; ?>').html('Your query has been delivered to Admin. Please be patient until you receive the answer.');
				  	$('#update_<?php echo $qid; ?>').addClass('hightlight');
			  	}
			  	
			});
			}catch(exc){
	   	//alert(exc);
	   	}
			return false;
	   });
	   
	   	});
</script>
<div id="update_<?php echo $qid; ?>"></div>    
<form action="Queries/insertdb.php" method="post">
  <table border="0" class='text_col_wht'>

  <tr>
    <td align="center" >Question :</td>
    <td align="center" >
    <textarea name="details" id="textarea" cols="45" rows="2"></textarea></td>
  </tr>
  <tr >
    <input type="hidden" name="qid" value="<?php echo $qid; ?>" />
    <td colspan="2" align="center">
	   <input type="submit" name="button" id="askbutton_<?php echo $qid; ?>" value="ASK" />
	</td>
  </tr>
</table>
</form>

</div>	