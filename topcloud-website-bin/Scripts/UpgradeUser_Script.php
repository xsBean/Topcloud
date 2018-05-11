<?php require '../Connections/Connections.php'; ?>
 <?php

@session_start();		  


			//If form is submitted
         if(isset($_POST['UpgradeUser'])){
			 
 $Email = $_POST['UserEmail'];
$UserLevel = $_POST['UpgradeLevel'];			

//Check if email exists
$EmailCheck = $con -> query("SELECT * FROM user where Email ='{$Email}'");
$AffectedEmail = mysqli_num_rows($EmailCheck); 
			 
			 //If email exists
			 if ($AffectedEmail==1) {
            $sql = $con -> query("UPDATE user SET UserLevel = '{$UserLevel}'  WHERE Email = '{$Email}'") ;
		   
         	//To trigger error if password not updated
            if(! $con )
            {
               die('Could not upgrade user: Please contact support ' . mysql_error());
            }
			$_SESSION['upgraded']= true;
			header('Location: ../AdminUpgradeUser.php');
           // echo "User Upgraded." ;
			 }	//End if affected email
		
			 else {
				 $_SESSION['noUser'] = true;
				 header('Location: ../AdminUpgradeUser.php');
			 	//echo "Email does not exist. Please register";
			 }
         }	//End if form submit
		 
		 
		 
		 
		 
?>