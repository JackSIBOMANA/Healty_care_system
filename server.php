<?php

				session_start();
			   include'connection/dbconnector.php';

			   //stmtc= statement connection
			   //This code will excute and return data from the database
			   
			    function get_all_people($dbc){
			     $stmtc= $dbc->prepare("SELECT *
			                         FROM people");
					$stmtc->execute();
					
			     //looping one after another
			     foreach($stmtc as $row){
				     print_r($row[1]);
				     echo"<br>";
					} 
			    }


			    	//the code bellow is to get a person whose name is on id one 
				function get_people_by_id($dbc,$stID){
			    $stmt = $dbc->prepare("SELECT *
									    FROM people
										WHERE id=? OR name LIKE ? OR location LIKE?");
			      $stmt->execute([$stID, "%".$stID."%","%".$stID."%"]);	
				
				//sp = search person
				$_SESSION['sp']= $stID;
				
				//sr = search result
				$_SESSION["sr"] = $stmt-> fetchAll();
					
				}



					function personal_by_id($dbc,$stID){
    $stmt2 = $dbc->prepare("SELECT c.c_name, e.e_year_enrolled FROM `people` as p INNER JOIN enrollment as e ON p.id =e.e_person_id INNER JOIN categories as c ON e.e_category_id = c.c_id WHERE p.id =?");

      $stmt2->execute([$stID]);	
	
	
	//sr = search result
	$_SESSION["categories"] = $stmt2-> fetchAll();
		
	}

     //this code add person to database

			function add_new_person($dbc,$stName,$stLocation){
		        $stmt =$dbc->prepare("INSERT INTO people(name, location) VALUES(?,?)");
				$stmt->execute([$stName,$stLocation]);
				
			   if ($stmt->rowCount() > 0){
				   $_SESSION['Notification'] ="New person is added Successful";
			}
			  else{$_SESSION['Notification'] ="Failed to add new person";
				
				}
			}	
			

         //this code add new category or diseases

			    	function add_new_category($dbc,$ctName,$ctDescr){
			$stmt=$dbc->prepare("INSERT INTO categories (c_name,c_description) VALUES(?,?)");
			$stmt->execute([$ctName,$ctDescr]);
			if ($stmt->rowCount() > 0) {
				$_SESSION['Notification'] ="New category is created Successful";
			}
			else$_SESSION['Notification'] ="Failed to create new category. Verify if it does not exist already in the system";
		}
			    
          // this code is for enrollment

			    function enroll_new_person($dbc,$ctrID,$categoryID,$denrolled){
			     $enow=$dbc->prepare("INSERT INTO enrollment (e_person_id, e_category_id, e_year_enrolled) VALUES(?,?,?)");
			     $enow->execute([$ctrID,$categoryID,$denrolled]);

			     if ($enow->rowCount() > 0) {
			     	$_SESSION['Notification'] ="Person Accepted";
			     }
			      else{
			      	$_SESSION['Notification'] ="Person Denied";
			      }


			}


	




    if (isset($_POST["ans"])){ 
				add_new_person($dbc, $_POST["name"],$_POST["location"]);
				header ("Location: ".$_SERVER["HTTP_REFERER"]);
				
			}
			else if (isset($_POST["searchp"])){
				    get_people_by_id($dbc, $_POST["search"]);
					header ("Location: ".$_SERVER["HTTP_REFERER"]);
			}


			elseif (isset($_POST['ctn'])) {
				add_new_category($dbc,$_POST['ct_name'],$_POST['ct_descr']);
				header("Location:".$_SERVER['HTTP_REFERER']);

			}

			//slctp= select person
			//prsID= personal id
			elseif (isset($_POST['enp'])) {
				enroll_new_person($dbc,$_POST['slctp'],$_POST['prsID'],$_POST['dateEnrolled']);
				header("Location:".$_SERVER['HTTP_REFERER']);
			}



			if (isset($_GET["pid"])) {
				personal_by_id($dbc, $_GET["pid"]);
			
			header("Location:". $_SERVER["HTTP_REFERER"]);
			}
			
?>