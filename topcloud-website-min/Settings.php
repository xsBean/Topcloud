<?php require('Connections/Connections.php'); ?>
<?php 
@session_start();

//If user is logged in
if (isset($_SESSION['UserID'])) {
		
		//Store userID session to a variable
		$Id = $_SESSION['UserID'];
			
		//Checks the fields in the table against the informtion entered in the page
	$result=$con->query("SELECT * FROM user WHERE UserID='{$Id}'" );
	
	$row = $result->fetch_array(MYSQLI_BOTH);
	

	
	//If submit button clicked
	if (isset($_POST['UpdatePassword'])) {
		
		//Store new password
		$password = $_POST['NewPassword'];
		
		//Store old password
		$oldPassword = $_POST['OldPassword'];
		
		//Hash password
		$hashedPassword = password_hash($password,PASSWORD_BCRYPT, array('cost' => 10));
		
		//Variable to check if old password matches the database
	$PasswordVerify = password_verify($oldPassword, $row['Password']);
		
			//If oldPassword matches the database	
			if($PasswordVerify) {
	$sql = $con -> query("UPDATE user  SET Password = '{$hashedPassword}' WHERE UserID ='{$Id}'");
	$_SESSION['Match'] = true;
			}//End if oldPassword
			else {
				$_SESSION['NoMatch'] = true;
		//To display error message
			}
	
	
	}//End if submit

}//end if UserID
	else {
		header('Location:Login.php');	
	}
?>



<html>
<head>
  <link rel="stylesheet" href="css/settings.css">
  <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
  <link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
</head>
<body>
  <div class="hr">
    <span class="logo"></span>
    <a class="return-button" href="Dashboard.php">
      <img src="css/Images/return-icon.png"></img>
    </a>
  </div>
  <div class="main-content">
    <div class="password-container">
      <h1>Update your password</h1>
      <!-- To display old password mismatch -->
      <?php  if (isset($_SESSION['NoMatch'])==true) { ?>
      <h2 style="color:#F00">Old password does not match </h2>
      <?php unset($_SESSION['NoMatch']); }
	    ?>
        <?php if (isset($_SESSION['Match'])==true) { ?>
        <h2 style="color:#F00">Password Successfully Updated </h2>
        <?php unset($_SESSION['Match']); } ?>
      <form method="post">
      
      <div class="password-input">
      <span id="sprypassword2">
      <label for="OldPassword">Old Password</label>
      <input type="password" name="OldPassword" id="OldPassword">
      <span class="passwordRequiredMsg">A password is required.</span></span>
      </div>
<div class="password-input">
        <label for="first-name"><span id="sprypassword1">New Password
          <input type="password" name="NewPassword" id="NewPassword">
          <span class="passwordRequiredMsg">A password is required.</span></span></label>
 
        </div>
        <div class="password-input">
          <label for="first-name"><span id="spryconfirm1">Confirm Password
          <input type="password" name="PasswordConfirm" id="PasswordConfirm">
          <span class="confirmRequiredMsg">A password is required.</span><span class="confirmInvalidMsg">The password's don't match.</span></span>          </label>

        </div>
        <div class="submit-button">
          <input type="Submit" name="UpdatePassword" id="UpdatePassword" value="Update password"/>
        </div>
      </form>
    </div>
  </div>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "NewPassword");
var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword2");
</script>
</body>
</html>
