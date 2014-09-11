<?php

//include db
include('database.php');

//checks for name
function get_ScreenName($find)
{
 
    $pdo = Database::connect();
    $sql= "SELECT * FROM userimagedetails"; 
    $rows=$pdo->query($sql);
	
	
    global $nameArray;
		foreach($rows as $row)
		{
		
		  $nameArray= array( $row['userName']);
		
		}
		
		Database::disconnect();
   //get a return
   foreach($nameArray as $name)
   {
       if($name==$find)
	   {
	     return $name;
		 break;
	   
	   }
   }
}


?>