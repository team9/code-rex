
<?php
  
  require_once("../rx_util.php");
  $qid = $_POST['questionid'];


  $fileid=date(d)."-".date(m)."-".date(Y)."_".date(G)."-".date(i)."-".date(s);
  
  /*if(!is_dir("SolutionUploads/$user"))
     mkdir("SolutionUploads/$user", 0777);*/
     
  
  
  $q1="insert into fbapp.inputs values (NULL,'$qid','')";
  $res=mysql_query($q1);
  $q2="select max(iid) from fbapp.inputs";
  $res2=mysql_query($q2);
  $b=mysql_fetch_array($res2);
  $iid = $b[0];
  move_uploaded_file($_FILES['input']['tmp_name'],"Inputs//$iid.txt");
  move_uploaded_file($_FILES['output']['tmp_name'],"Outputs//$iid.txt");
  echo $_FILES['output']['tmp_name'];
  
?>
<script type="text/javascript">
   //alert("File upload successful !");
  // window.location='solutionFileChoose.php';
</script>
  

