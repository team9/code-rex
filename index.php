<link rel="stylesheet" type="text/css" href="cssverticalmenu.css" />
<script type="text/javascript" src="cssverticalmenu.js">
</script>

<?php
	require_once('Headder.php');
	require_once('rx_util.php');
	
?>

<script>
				window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '255931397802922', // App ID
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
						 //$("#my-fb-login").show();
					 }
					 //setTimeout("",60000)
					 }catch(ex){
					 	alert(ex);
					 }
				});
				 };
		  $(document).ready(function(){
				$(".fb-login-button").hide();
				$("#my-fb-login").hide();		
			});

		</script>
		<style type="text/css">@import url(&#39;https://themes.googleusercontent.com/fonts/css?kit=70P0G8gxVDIV6F9om0DsKg&#39;);
ol{margin:0;padding:0}p{margin:0}
.c2{font-size:14pt;font-family:Comic Sans MS;font-weight:bold}.c11{width:468pt;background-color:#ffffff;padding:72pt 72pt 72pt 72pt}
.c6{color:#00b0f0;font-size:18pt;font-family:Trebuchet MS}.c5{color:#5cb6eb;font-style:italic}.c15{color:#0000ff;font-style:italic}
.c7{color:#ff0000;font-style:italic}.c14{font-family:Verdana}.c9{font-family:Comic Sans MS}.c3{font-weight:bold}.c13{text-indent:36pt}
.c0{font-family:Courier New}.c4{height:11pt}.c16{font-style:italic}.c1{direction:ltr}.c10{font-family:Trebuchet MS}.c8{color:#5cb6eb}.c12{font-family:Droid Serif}

</style>
		<div id='my-fblogin' class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>

		<div id="my-fb-login" style="right:300px;">
		<fb:login-button registration-url="http://www.ask.csetist.com/code-rex/Registration.php"></div>
		</div>
		<script type="text/javascript" >
		function loadContents(opt){
				if((typeof opt)==='string'){
					ajxurl=opt;
				} else {
					ajxurl=$(this).attr("href");
				}
				$.ajax({
					type: 'GET',
					url: ajxurl,
					data: '',
					success: function (htmldata){
						$('#all_content').html(htmldata);
						}
					});
				return false;
				}
		$(document).ready(function (){
			loadContents('home.php');
			$('#side_bar a').click(loadContents);
                        $('#fb-php-login-btn').button();
			});
 function loadPage(element){
 	alert($(element).attr("href"));
 	}
</script>
<?php
	mysql_close($con);
	//echo $_SERVER["REMOTE_ADDR"];

?>
<style type="text/css">
#my-fblogin{
	position: absolute;
	top: 35px;
	right: 250px;
	}
#my-fb-login{
		position: absolute;
		top: 50px;
		right: 50px;
	}
#side_bar{
	position: absolute;
	left: 5px;
	width: 140px;
	top: 136px;
	
	}
#side_bar ul{
	list-style-type: none;
	
}
#all_content {
	position: absolute;
	left: 140px;
	top: 120px;
	right: 50px;
	}	
#sponsor {
        position: absolute;
        right: 10px;
        top: 15px;
        
}
#sponsor_img{
        height: 80px;
        width: 290px;
}
</style>
<div id='fb-php-login-btn'><?php if($user !=0 ){echo "<a href='".$facebook->getLogoutUrl(array( 'next' => 'http://www.ask.csetist.com/code-rex/' ))."'>Log-Out</a>";
}else { echo "<a href='".$facebook->getLoginUrl( array( /*scope => 'read_stream, friends_likes',*/redirect_uri => 'http://www.ask.csetist.com/code-rex/' ))."'>Log-In</a>";} ?></div>	<div id="side_bar">
	
        <ul  id="verticalmenu" class="glossymenu">
        <li>&nbsp;</li>
	<li><a href="home.php">Home</a></li>
        <li>&nbsp;</li>
        <li><a href="compeet1.php" >Level One</a></li>
        <li>&nbsp;</li>
        <li><a href="compeet2.php" >Level Two</a></li>
        <li>&nbsp;</li>
	<li><a href="Rank/rank.php" >Rank</a></li>
        <li>&nbsp;</li>
	<!-- li><a href="faq.php" >Faq</a></li>
        <li>&nbsp;</li>
	<li><a href="credit.php" >Credit</a></li> -->
        <li>&nbsp;</li>
	</ul>
 
       
	</div>
	<div id="all_content">
	</div>
        <div id="sponsor"><a href='http://helloinfinity.com/'><img id='sponsor_img' src="http://www.ask.csetist.com/code-rex/heloinfi.png" height="108" width="550"/></a></div>
   </body>
</html>						