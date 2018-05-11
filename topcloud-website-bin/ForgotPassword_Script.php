<?php require('Connections/Connections.php'); ?>
 <?php
		  


			//If form is submitted
         if(isset($_POST['Submit'])){
			 
			  $Email = $_POST['Email'];
 $NewPassword = randomPassword();
 //Hash new password
 $HashedNewPassword = password_hash($NewPassword, PASSWORD_BCRYPT, array ('cost' => 10));
  
 //Check if the specified email exists
 $EmailCheck = $con -> query ("SELECT * FROM user WHERE Email ='{$Email}'");
 $AffectedEmail = mysqli_num_rows($EmailCheck);
 
			 
			 
			 //If email exists
			 if ($AffectedEmail==1) {
            $sql = $con -> query("UPDATE user SET Password = '{$HashedNewPassword}'  WHERE Email = '{$Email}'") ;
           
		   
		   /**
		   Email the new password to the user
		   */
		   $from = 'passwordrecovery@topcloud.com';
		   $to = '$Email';
		   $subject ='Password Recovery';
		   $message ='Hello, 

You have requested a password reset. Your new password is: $NewPassword. ';
		   mail($to,$subject,$message,$subject);
		   
		   
		   
         	//To trigger error if password not updated
            if(! $con )
            {
               die('Could not update data: Please contact support ' . mysql_error());
            }

            echo "Password successfuly sent." ;
			 }	//End if affected email
		
			 else {
				 $_SESSION['success'] = "No";
			 	echo "Email does not exist. Please register";
			 }
         }	//End if form submit
		 
		 
		 
		 
		 
		 /**
		 Generate a new random password
		 */
		 
		 function randomPassword() {
			 //Length of new password
	 $len  =8;
		 // Create a list of word to be in the new password
		 $charPool = 'abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@&*()-+';
		 	//Create an array for the new password
		 $pass = array();
		 	//length of the array
		 $length = strlen($charPool)-1;
		 
		 for ($i=0; $i<$len; $i++) {
			 //Randomise the characters
		 	$n = rand(0,$length);
			//Insert the randomised characters to the array
			$pass[] = $charPool[$n]; 
		 
			 }
		 return implode($pass);
		 }	//end function randomPassword
	
		 
		 
		 
		 
?>