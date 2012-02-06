
<?php

	    require_once("../rx_util.php");
?>
<script type="text/javascript" src="jquery.js"></script>
<style>
#answerInsert {
	float:RIGHT;
    border:1px solid #C60;
	padding:20px;
	
}
#questionInsert {
	float:left;
	border:1px solid #C60;
	padding:10px;
	width:500PX;
	
}
#questions {
	height:300px;
}
</style>
<script >

     
    //if submit button is clicked
    //$('#submitq').submit(checkForm);
    function checkForm() {        
         try{
        //Get the data from all the fields
        var qText = $('input[name=qText]');
        var level = $('select[name=level]');
        var qtype = $('select[name=type]');
        var details = $('textarea[name=details]');
 			alert(name.val()+email.val()+qtype.val()+details.val());
        //Simple validation to make sure user entered something
        //If error found, add hightlight class to the text field
        if (qText.val()=='') {
            qText.addClass('hightlight');
            return false;
        } else qText.removeClass('hightlight');
         
        if (level.val()=='') {
            level.addClass('hightlight');
            return false;
        } else level.removeClass('hightlight');
         
        //organize the data properly
        var data = 'qText=' + qText.val() + '&level=' + level.val() + '&qtype='
        + qtype.val() + '&details='  + encodeURIComponent(details.val());
         
        //disabled all the text fields
        $('.text').attr('disabled','true');
         
        //show the loading sign
        $('.loading').show();
         
        //start the ajax
        $.ajax({
            //this is the php file that processes the data and send mail
            url: "questions/questionsInsert.php", 
             
            //GET method is used
            type: "POST",
 
            //pass the data         
            data: data,     
             
            //Do not cache the page
            cache: false,
             
            //success
            success: function (html) {              
                //if process.php returned 1/true (send mail success)
                if (html==1) {                  
                    //hide the form
                    $('.form').fadeOut('slow');                 
                     
                    //show the success message
                    $('.done').fadeIn('slow');
                     
                //if process.php returned 0/false (send mail failed)
                } else alert('Sorry, unexpected error. Please try again later.');               
            }       
        });
         
        //cancel the submit button default behaviours
        return false;
        
        }catch(ex){
    	alert(ex);
    	}
	}
    
	function showQuestion() {
		$('document').se
	}
	
</script>
<div id="questions">
<div id="questionInsert">
<form id="questionDetails" action="questionsInsert.php" method="post"  >

<table>
  <tr>
    <td>Enter a question</td>
    <td><TEXTAREA name="qText" id="qText" COLS=40 ROWS=6></TEXTAREA></td> 
  </tr>
  <tr>
    <td>Enter answer(if any)</td>
    <td><input type="text" id="aText"  name="aText" width="100" height="50"></td>
  </tr>
  <tr>
    <td>Enter marks</td>
    <td><input type="text" id="mark"  name="mark"></td>
  </tr>
  <tr>
    <td>Enter Details:</td>
    <td><textarea name="details"></textarea></td>
  </tr>
    <tr>
    <td>Enter level:</td>
    <td><select name="level">
    <?php

	    $res=mysql_query("SELECT * FROM `fbapp`.`level`");
	    //echo 'Error: '.mysql_error();
	    while($row = mysql_fetch_array($res))
		  {
			  echo "<option value=".$row['levelid'].">".$row['levelid']."</option>";
		  }

	?></select>
</td>
  </tr>
    <tr>
    <td>Enter Type:</td>
    <td><select name="type">
   <option value="knowledge">knowledge</option>
   <option value="algorithmic">algorithmic</option>
   <option value="development">development</option>
   </select>
	</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" id="submitq" value="Insert Question"></td>
  </tr>
 </table>
 <div class=".highlight"></div>
</form>  
</div>
<div id="answerInsert">
<form action="questions/IOInsert.php" enctype="multipart/form-data" method="post">
<br />
<br />
<div>Select Question
<select name="questionid" onchange="showQuestion(<?php echo $row['question']; ?>)">
    <?php

	    $res=mysql_query("SELECT qid,question FROM `fbapp`.`questions`");
	    echo 'Error: '.mysql_error();
	    while($row = mysql_fetch_array($res))
		  {
			  echo "<option value=".$row['qid'].">".$row['qid']."</option>";
		  }
		  
		  

	?></select>
    
   
</div>

<div>Sample input <input type="file" id="input" name="input"></div>
<div>Sample output<input type="file" id="output" name="output"></div>
<br />
<div align="center"><input type="submit" id="IO" value="Save"></div>
</form>
</div>
</div>