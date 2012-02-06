<?php

require_once("rx_util.php");
if($user !=0 && in_array($user,array('100000711519887','1296747620'))) {
require_once("Headder.php");

?><script>
		  $(document).ready(function(){	
				// Tabs
				$('#tabs').tabs();
			});

		</script>

<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Activity</a></li>
				<li><a href="questions/questionsRead.php">Add Questions</a></li>
				<li><a href="Queries/answer.php">Quries</a></li>
				<li><a href="#tabs-3">Logged In Users</a></li>
			</ul>
			<div id="tabs-1"></div>
			<!--<div id="tabs-2">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</div>-->
			<div id="tabs-3">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>
		</div>
<?php
		/*} catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }  */ 
    } else {

      // No user, print a link for the user to login
      
      require("404.php");

    }
	mysql_close($con);
	//echo $user;
?>
   </body>
</html>