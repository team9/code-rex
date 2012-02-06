<?php 
  require_once('../rx_util.php');
  header('Content-type : text/plain');
  header('Content-Disposition : attachment; filename = "SampleInput.txt"'); 
  $time = time();
  $qid = $_GET['qid']; 

  
  $q2="select iid from `ask_cse`.`inputs`  where qid='".$qid."' order by rand() limit 1";
  $res2=mysql_query($q2);
  $r2=mysql_fetch_array($res2);	
  
  readfile('Inputs//'.$r2[0].'.txt');
  
  $iid = $r2[0];
  $uid = $user;
 
  
  $q1 = "insert into `ask_cse`.`submissions` values (NULL,'$uid','$qid','$iid','$time',-1,0)";
  $res = mysql_query($q1);
  
?>
