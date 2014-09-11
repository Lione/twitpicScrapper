


<html>
<head>
<link href="css/style.css" rel="stylesheet"/>
<!--Scripts (jQuery + LightBox Plugin + imgallery Script)-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.lightbox.js"></script>
<script type="text/javascript" src="js/imgallery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#gallery").lightBox();
});
</script>
 
<!--CSS (LightBox CSS + imgallery CSS)-->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="css/imgallery.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Get Images</title>
</head>
<body>
			 <div id="header">
				<div>
			
			<div id="navigation">
				<div>
					<ul>
					<li class="current"><a href="index.php">Home</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="testPicture.php">Photos</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						
					</ul>
				</div>
				
			</div>

			<div id="body">
			
			<div>
			<div id="connect">
			
			<h3><p>Let's get a photo to test</p><br/></h3>
<form action="testPicture.php" method="post">
Enter Screen_Name<br/>
<input type="text" required="required" size="23" name="name"/><br/>
<input type="submit" name="submit" value="Check Pictures" />

</form></div>

<div id="contact">
<?php
//check post and GET request
echo '<h3><center><a href="gallery.php">View Full Gallery</a></center></h3>';
if(isset($_POST['submit']))
{
  session_start();
  
  $name=$_POST['name'];
  $_SESSION['username']=$name;
  
  //resource address
  $url="http://localhost:436/api/twitpicAccess.php/?name=$name";
  
  //send request from resource
  $client=curl_init($url);
  curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
  //get response
   $response= curl_exec($client);
   //close 
	 curl_close($client);
   $result=json_decode($response);
   
    $image=$result->data;
	if(empty ($image))
	{
	
	   echo "<br/><br/>".$name." has no pictures in our gallery :-( <br/><br/><br/><br/>";
	   echo '<a href="index.php">Please check to test your handle if its valid then you need to add photos on TwitPic</a>';
	}
	else
	{
	//image gallery php class

        include('imgallery.php');
		
		echo "<center><h3>TwitPic scrapped Photos</h3></center><br";
		echo "<center>";
		ImgGallery::getPublicSide();
		echo "</center>";
	}
	
	
}



?>
</div>

<div id="footer">



<center><p>Beta Twitpic Scrapper -Alushula Lione</p></center>

</div>

</body>
</html>
