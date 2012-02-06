<?php
	require_once('../rx_util.php');

   $level=$_GET['level'];
   $type="algorithmic";
   //rx_logEvent("question=".$qstnid,$con);
   $q1="select * from `ask_cse`.`questions` where `type`='".$type."' AND levelid='".$level."'";
   $res1=mysql_query($q1);
  // echo ''.$q1.' '.mysql_error();
  $qid = 2;
  $q2="select iid from `ask_cse`.`inputs` where qid='$qid'";
		$res2=mysql_query($q2);
		//echo ''.$q2.' '.mysql_error();
		$r2=mysql_fetch_array($res2);	
		
		$index=count($r2);
		//echo $index;
  
  $iid = 15;
  
?>

<script type="text/javascript" >

function redirect(qid)
{
document.getElementById('my_form'+qid).target = ('my_iframe'+qid); //'my_iframe' is the name of the iframe
document.getElementById('my_form'+qid).submit();
}

</script>

<script >

   var quest={};
	function askQuestion(qid){

	      var datastr='qid='+qid;

	      $.ajax({
			  type: 'POST',
			  url: 'Queries/queries.php',
			  data: datastr,
			  success: function(htmldata) {
			  	//alert(htmldata);
			  	quest[qid]=$('#quest_'+qid).html();
			  	$('#quest_'+qid).html(htmldata);
			  	}
			  	
			});
			
			//return false;
	}
	function submitSolutin(qid){

		//alert('hi'+qid);
			var codefl = $('input[name=code_'+qid+']');
         var outputfl = $('input[name=output_'+qid+']');

	      var datastr='qid='+qid+'&code='+codefl.val()+'&output='+outputfl.val();
	      alert('hi'+datastr);
	      $.ajax({
			  type: 'POST',
			  url: 'questions/solutionUpload.php',
			  data: datastr,
			  success: function(htmldata) {
			  	alert(htmldata);

			  	}
			  	
			});
			
			return false;
	}
	
	function backToQuestion(qid){
		$('#quest_'+qid).html(quest[qid]);
	}
	$(function() {
		//alert(<?php echo "\"#accordion".$type."\"";?>);
		$( <?php echo "\"#accordion".$type."\"";?> ).accordion();
		$( "input:submit,input:file, a, button", ".demo" ).button();
		
	});
	

</script>

<?php echo "<div id=\"accordion".$type."\">";
  while( $r1=mysql_fetch_array($res1)) {
	  
 ?>
 <h3><a href="#"><?php echo ' '.$r1['question'];?></a></h3>
	
		<?php
		echo "<div class='demo' id='quest_".$r1['qid'] ."'><div class='marks'>Marks: ".$r1['mark']."</div>";
		echo "<script >	\$(function() {\$( \"button\", \".demo\" ).button();/*\$( \"#ask_".$r1['qid']."\").click(askQuestionTougle(\"".$r1['qid']."\"));*/	});</script>";
		
		echo "<button id='ask_".$r1['qid']."' onclick='askQuestion(\"".$r1['qid']."\")'>ask doubt</button>";

		 echo "<div > ".$r1['details'];

		echo "</div>";

		?>
		<script>
			var solution_downloaded<?php echo $r1['qid'];?>=false;
                        var count<?php echo $r1['qid'];?>=0;
			function check(){
				if(solution_downloaded<?php echo $r1['qid'];?>===true){
                                        count<?php echo $r1['qid'];?>++;
					//solution_downloaded=false;
					//alert('hi');
					//setTimeout(,1000);
					checkCountdown("<?php echo $r1['qid'];?>");
				}
				
			}
			function checkCountdown(qid){
				datastr="qid="+qid;
					$.ajax({
						  type: 'POST',
						  url: 'questions/timer.php',
						  data: datastr,
						  success: function(htmldata) {
							  	
							  	if(htmldata!="notinprogress"){
						  			$("#time_left"+qid).html(htmldata);
                                                                           solution_downloaded<?php echo $r1['qid'];?>=false;
                                                                           count<?php echo $r1['qid'];?>=0;
						  			//alert(htmldata);
						  		}else{
                                                                           if(solution_downloaded<?php echo $r1['qid'];?>===true){count<?php echo $r1['qid'];?>++;}
                                                                           if(count>5){solution_downloaded<?php echo $r1['qid'];?>=false;count<?php echo $r1['qid'];?>=0;}
						  			//alert(htmldata);
						  		}
						  	} 	
						});
			}
			$(document).ready(function (){
					checkCountdown(<?php echo $r1['qid']; ?>);
					setInterval(check,2000);
				});
		
		</script>
		</script>
        <style > 
		.time_left {
		  float:right;
		  position: absolute;
		  right: 0px;
		  
		}
                .marks{position: absolute;right:40px;}
        </style>
        <div id="time_left<?php echo $r1['qid'];?>" class="time_left">
  			</div>
        <a href="questions/downloadSample.php?qid=<?php echo $r1['qid'];?>" onclick="javascript:solution_downloaded<?php echo $r1['qid'];?>=true;">Download test input</a> 
        
		<form id="my_form<?php echo $r1['qid'];?>" action="questions/solutionUpload.php" method="post"  onSubmit="redirect('<?php echo $r1['qid'];?>')" enctype="multipart/form-data">
		<table border="0" >
		
		  <tr>
		    <td colspan="2"><span style="color:white">Source:</span> </td>
		    <td><input type="file" id="code" name="code" ></td>
		  </tr>
		  <tr>
		    <td colspan="2"><span style="color:white">Output:</span> </td>
		    <td><input type="file" id="output" name="output"></td>
		    <td><input type="hidden" name="qid" value="<?php echo $r1['qid'];?>"></td>
		  </tr>
		
		  <tr>
		    <td colspan="3" align="center"><input type="submit" value="Upload"></td>
		  </tr>
          <tr>
            <td>&nbsp;</td>
            
          </tr>
          
		</table>
        <iframe id='my_iframe<?php echo $r1['qid'];?>' name='my_iframe<?php echo $r1['qid'];?>' src="" frameborder="0">
        </iframe>
		</form>  
	</div>  
<?php
}
	?>
	</div>
	<?php
	mysql_close($con);
?>  
