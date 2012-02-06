

   
<?php 
require_once("../rx_util.php");
  
  
   $question = $_POST['qText'];
    $details = $_POST['details'];
   $level = $_POST['level'];
   $type = $_POST['type'];
   $marks = $_POST['mark'];
   $answer = $_POST['aText'];

 //  $q1="INSERT INTO `fbapp`.`questions`(`qid`, `question`, `details`, `levelid`, `type`,`mark`) VALUES (NULL,'".$question."','".$details."','".$level."','".$type."',".$marks.")";
   $q1="INSERT INTO `fbapp`.`questions`(`qid`, `question`, `details`, `levelid`, `type`, `mark`) VALUES (NULL,'".$question."','".$details."','".$level."','".$type."','".$marks."')";
   echo "Query : ".$q1;
   $res=mysql_query($q1);
   //if($res == false) { echo "Question not inserted.... Please check the details filled !";}
   //else {
   		$q2="SELECT MAX(qid) FROM `fbapp`.`questions`";
   		$res2=mysql_query($q2);
   		$row = mysql_fetch_array($res2);
   		echo "Last qid : ".$row[0];
		
		$qid = $row[0];
   
   //}
  
    $q3="INSERT INTO `fbapp`.`inputs`(`iid`, `qid`, `answer`) VALUES (NULL,'".$qid."','".$answer."')";
   //$q1="insert into contest.questions values ('hai','hello','trrrrr')";
   //echo "+++".$qid."+++".$question."+++".$extension."++++";
   $res3=mysql_query($q3);
  
    
   if(mysql_error()){
   	echo "Some error ".$q1 .' '.mysql_error();
   }else {
   	header( 'Location: ../admin.php' ) ;
   	}
   //echo "Question successfully inserted in database!";
?>


