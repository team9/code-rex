
<html>
<head>

</head>

<body>

<?php    
   $con=mysql_connect("localhost","root","root");
   mysql_select_db("contest",$con);
   $q1="select * from contest.questions";
   $res1=mysql_query($q1);
   $r1=mysql_fetch_array($res1);
   
?>  
   
  <table id="questionsListing" width="669" border="1" align="center" cellspacing="0" >

    <?php
   do
   {  echo "<tr>";
      echo "<td align='center' >".$r1[0]."</td>";
	  echo "<td align='center' >".$r1[1]."</td>";
	  echo "<td align='center' >".$r1[2]."</td>";
	  echo "<td align='center' ><input type='button' id='changeContents' value='Edit'></td>";
	  echo "</tr>";
   }  while($r1=mysql_fetch_array($res1)); 
   ?>
  </table>



</body> 
</html>



