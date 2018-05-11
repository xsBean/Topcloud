<?php require 'Connections/Connections.php'; ?>
<?php 
	session_start();

if (isset($_POST['LoginButton'])){
	
	//Variables created from class id of Login Form
	$UserName = ($_POST['UserName']);
	$Password = ($_POST['Password']);
	
	//Checks the fields in the table against the informtion entered in the page
	$result=$con->query("SELECT * FROM user WHERE UserName='$UserName'" );
	
	$row = $result->fetch_array(MYSQLI_BOTH);
	
	//If statement to verify hashed password

	if(password_verify($Password, $row['Password'])) {

	//Storing the user session and knowing the type of user
	$_SESSION["UserID"] = $row["UserID"];
	
	//Redirecting to account page after successull login
//Checks UserLevel against the database 
	 
	
	
	
	$_SESSION["UserType"] = $row["UserLevel"];
	
	    if(($_SESSION['UserType'] == 1) or ($_SESSION['UserType'] == 2) or ($_SESSION['UserType'] == 3)) {
   header('Location: Dashboard.php');
		}//End if user  redirect 

else {
	
	header('Location: Admin.php');
	
	
	}//End if user type redirect 
	
	
	}//End if password verify
//Else method to return error message if failed login
	else {
		$_SESSION['FailedLogin'] = true;
	}
}//End if submit

?>


<!DOCTYPE html>
<html >
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Log-in</title>

    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.indigo-pink.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <!-- <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'> -->
    <link rel="stylesheet" href="css/index.css">
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">

    <!-- <script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script> -->
    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script> -->
  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
  </head>

  <body>
    <div class="logo-banner">
      <span></span>
    </div>
    <div class="top-container">
      <h1>One website. All of your cloud.</h1>
      <h2>
      <p>Sign in with your NetID
      </h1>
      <!--Error for message from admin page for not having privileges -->
      <?php if (isset($_SESSION['NotAdmin'])) {?>
      <h2> Please contact administrator! </h2>
      <?php unset($_SESSION['NotAdmin']); }?>
		  <!--end admin error message -->
          
          <!--Error message for wrong credentials -->
      <?php if(isset($_SESSION['FailedLogin'])==true) { ?> 
                  
 <h2>Login Failed. Please check user name and password</h2>
   	    <?php unset($_SESSION['FailedLogin']); } ?>
        <!--End error for wrong credentials -->
   </p>
   </div>
   
   
    <div class="sign-in-card">
        <div>
          <form method="post">
          <br>
          <br>
            <span id="sprytextfield2">
<input type="text" placeholder="User Name" name="UserName" id="UserName">
            <span style="border:none" class="textfieldRequiredMsg">Username required.</span></span>
            <span id="sprypassword2">
            <br>
            <br>
<input type="password" placeholder="Password" name="Password" id="Password">
            <span style="border:none" class="passwordRequiredMsg">Password required.</span></span>
            <br>
            <br>
           <input name="LoginButton" type="submit" id="LoginButton" value="Sign in" style= "Color:#FFF" class="sign-in-button" />
          </form>
        </div>

      <div class="sign-in-help">
        <a href="AccountRecovery.php">Need help?</a>
      </div>
    </div>
  <div class="register">
      <a href="Register.php">Create account</a>
  </div>
  <script type="text/javascript">

var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword2");
  </script>
  </body>

  
  </div>
</html>
