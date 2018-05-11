<?php require 'Connections/Connections.php' ; ?>
<?php 
@session_start();

//Checks if button is clicked

if (isset ($_POST['Register'])) {
	
	$FName = ($_POST['FName']);
	$LName =($_POST['LName']);
	$UserName = ($_POST['UserName']);
	$Password = $_POST['Password'];
	
	//Insert the check boxes to the database
		$Box = $_POST['box'];
		//Sort the course name
		sort($Box);
		//Contancate the values
		$CourseName = implode(',', $Box);
	
	$Email = $_POST['Email'];

		//Password hash
	$HashedPassword = password_hash ($Password, PASSWORD_BCRYPT, array('cost' => 10));
	
	//Check duplicate username in the database
	$CheckUserName = $con -> query("SELECT * FROM user WHERE UserName = '{$UserName}'");
	$AffectedUserName = mysqli_num_rows($CheckUserName);
	
	//Check duplicate email in database
	$CheckEmail = $con -> query("SELECT * FROM user WHERE Email = '{$Email}'");
	$AffectedEmail = mysqli_num_rows($CheckEmail);
	
	//If there exists a duplicate user or email. Reject application
	if (($AffectedUserName ==0) and ($AffectedEmail ==0)) {
		//Insert data using the variables in to the 'user' table
	$sql = $con -> query("INSERT INTO user (FName, LName, Email, UserName, CourseName, Password) VALUES('{$FName}', '{$LName}','{$Email}','{$UserName}','{$CourseName}','{$HashedPassword}')");

//Redirects users to login page after successful registration. 
header ('Location: index.php');
	}
	else { //Reject register application
		$_SESSION['UserNameCheck'] = "Yes";
	}
}
?>





<!DOCTYPE html>
<html >
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Create a TopCloud Account</title>

    <link rel="stylesheet" href="css/create-account.css">
    <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/create-account.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
  <script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  </head>

  <body>
    <div class="banner">
      <div class="left-banner">
      	<a></a>
      </div>
      <div class="right-banner">
        <div class="sign-in-button">
          <a href="index.php">Sign-in</a>
        </div>
      </div>
    </div>
    <div>
      <h1>Create your TopCloud Account</h1>
    </div>
    <div class="main-container">

      <div class="graphic-container">
        <h2>A browser is all you need</h2>
        <h3>TopCloud is awesome and possibly the greatest invention ever</h3>
        <span></span>
</div>
      <div class="info-container">
        <form method="post">
        <!--Display message for reason of reject registration-->
         <?php if (isset($_SESSION['UserNameCheck'])) { ?>
    <div class ="FormElement" style="color:#F00"><h2>Username or email already registered. Please login!</h2> </div>
    <?php } ?>
    <!-- End reason -->
          <div class="name-input">
            <label for="FName">First Name</label>
            <span id="sprytextfield1">
            <label for="FName"></label>
            <input type="text" name="FName" id="FName">
            <span class="textfieldRequiredMsg">
First Name required.</span></span>
          </div>
          
           <div class="name-input">
            <label for="LName">Last Name <br>
            </label>
            <span id="sprytextfield2">
            <label for="LName"></label>
            <input type="text" name="LName" id="LName">
            <span class="textfieldRequiredMsg">Last Name required.</span></span>            
          </div>
          
          <div class="username-input">
            <label for="Username">Choose your username</label>
            <span id="sprytextfield3">
            <label for="UserName"></label>
            <input type="text" name="UserName" id="UserName">
          <span class="textfieldRequiredMsg">Please select username.</span></span> </div>
          <div class="password-input">
            <div class="password-create">
              <label for="password">Create your password</label>
              <span id="sprypassword1">
              <label for="Password"></label>
              <input type="password" name="Password" id="Password">
              <span class="passwordRequiredMsg">Password is required.</span> </span>              <span class="errormsg-off">Invalid password</span>
            </div>
            <div class="password-confirm">
              <label for="password-confirm">Confirm your password</label>
              <span id="spryconfirm1">
              <label for="PasswordConfirm"></label>
              <input type="password" name="PasswordConfirm" id="PasswordConfirm">
              <span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">Passwords don't match.</span></span>              <span class="errormsg-off">These passwords do not match</span>
            </div>
          </div>
          <div class="class-input">
            <div class="class-option">
              <span class="errormsg-off"></span>
              <label for="cs-170">CS-170</label>
              <input type="checkbox" name="box[]" id="cs-170" value="CS 170"/>
            </div>
            <div class="class-option">
              <label for="cs-180">CS-180</label>
              <input type="checkbox" name="box[]" id="cs-180" value="CS 180"/>
            </div>
            <div class="class-option">
              <label for="cs-221">CS-221</label>
              <input type="checkbox" name="box[]" id="cs-221" value="CS 221"/>
            </div>
          </div>
          <div class="email-input">
            <label for="Email">Your current email address</label>
            <span id="sprytextfield4">
            <label for="Email"></label>
            <input type="text" name="Email" id="Email">
          <span class="textfieldRequiredMsg">Email is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span> </div>
          
          
          <div class="recaptcha">
            <div class="g-recaptcha" data-sitekey="6LcJxg8TAAAAADuYhtinkwmyhRMDujJcX_q56KBp"></div>
          </div>
         	<div class = "submit-button" >
           <input name="Register" type="submit" class="create-account-button" id="Register" style="color:#FFF" value="Register" />
           </div>
        </form>
      </div>
    </div>
  <script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "Password");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
  </script>
  </body>
</html>
