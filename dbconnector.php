<?php
    
	 
	//dba = database connection
	//This is a variable to initialize the PDO
	$dbc =null;
	
   try {
	   $dbc = new PDO("mysql:host=localhost;dbname=healthydb","root","");
	} catch (Exception $e){
		print_r($e->getMessage());
	}
	

	




	


?>