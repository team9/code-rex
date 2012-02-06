<?php 

include_once('rx_util.php');
	
?>
	<style type="text/css">
.demo {
	min-height: 300px;
	/*max-height: 500px;*/
	}
#tabs {
	min-height: 300px;
	/*max-height: 600px;*/
}
.quest {
	background-color: #aba5c0;
	font: 50%;
}
.answer {

	font: 40%;
}
</style>
		<script>
		/*window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '293018567378853', // App ID
		      status     : true, // check login status
		      cookie     : true, // enable cookies to allow the server to access the session
		      xfbml      : true  // parse XFBML
		    });
		
		    FB.getLoginStatus(function(response) {
					//alert("fun called"+response.status);
					try{
						if (response.status === 'connected') {
								$("#my-fb-login").hide();								
								$(".fb-login-button").show();
						  
					 } else {
							$(".fb-login-button").hide();
						 $("#my-fb-login").show();
					 }
					 //setTimeout("",60000)
					 }catch(ex){
					 	alert(ex);
					 }
				});
				 };*/
		  $(document).ready(function(){
				//$(".fb-login-button").hide();
				//$("#my-fb-login").hide();
				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
			});

		</script>
		
	<!--	<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>

		<div id="my-fb-login">
		<fb:login-button registration-url="http://127.0.0.1/coderex/Registration.php"></div>
		</div>-->
	
<?php
if($user!=0) {
echo "You are : ".$userdetails[1];

?>	
<div id="tabs" >
			<ul>
            <!-- li><a href="#intro">Intro</a></li> -->
				<li><a href="questions/questionShowKnwlg.php?level=sample">Knowledge</a></li>
				<li><a href="questions/questionShowAlg.php?level=sample">Algorithm</a></li>
				<li><a href="questions/questionShowApp.php?level=sample">App Development</a></li>
            <li><a href="Rank/marks.php?uid=<?php echo $user; ?>">Results</a></li>

			</ul>
			<!--<div id="tabs-1"></div>-->
			<!-- div id="intro">Phasellus mattis tincidunt nibh. Cras orci urna, blandit id, pretium vel, aliquet ornare, felis. Maecenas scelerisque sem non nisl. Fusce sed lorem in enim dictum bibendum.</div>
			<!--<div id="tabs-3">Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.</div>-->
		</div>


<?php
	mysql_close($con);
	}else {	
               //header('Location: http://www.ask.csetist.com/code-rex/Registration.php');
                 ?><script>window.location = 'http://www.ask.csetist.com/code-rex/Registration.php';</script><?php
        }
?>
   </body>
</html>		