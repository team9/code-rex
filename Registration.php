<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>
<?php
require_once('Headder.php');
?>

<script>
		  
		  (function(d){
		     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		     js = d.createElement('script'); js.id = id; js.async = true;
		     js.src = "//connect.facebook.net/en_US/all.js";
		     d.getElementsByTagName('head')[0].appendChild(js);
		   }(document));

		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '255931397802922', // App ID
		      status     : true, // check login status
		      cookie     : true, // enable cookies to allow the server to access the session
		      xfbml      : true  // parse XFBML
		      
		     
				
		    });
		 FB.Event.subscribe('auth.authResponseChange', function(response) {
				  //alert('The status of the session is: ' + response.status);
				  if(response.status==='connected'){
				  	//window.location='index.php';
				  	}
				});
	    FB.getLoginStatus(function(response) {
				//alert("fun called"+response.status);

					if (response.status === 'connected') {
							//window.location='index.php';
				 }
			});

	};
</script>

      <fb:registration
      fields='[
      {"name":"name"},
      {"name":"birthday"},
      {"name":"gender"},
      {"name":"location"},
      {"name":"email"},
      {"name":"prog_language","description":"Choice Of Programing Language","type":"select","options":{"C":"c/c++","java":"Java","python":"Python","ruby":"Ruby"}},
      ]',
      redirect-uri="http://www.ask.csetist.com/code-rex/echo.php"
      width= "600">
      </fb:registration>
     <!-- <script src="//connect.facebook.net/en_US/all.js#xfbml=1&appId=293018567378853"></script>-->
	