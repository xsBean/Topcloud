<?php require 'Connections/localhost.php'; ?>
<?php
session_start();
//Variable to store user level
$User1=2;
$User2 = 3;
//Query to run to get user level form databse
$sql =mysql_query("SELECT * FROM user WHERE UserLevel = '{$User1}' OR UserLevel = '{$User2}'");

//Store the user level from the database after query
$UserLevel['UserType'] = $sql['UserLevel'];


//If the user session is of the specified $UserLevel  then allow access  
if (($_SESSION['UserType']==$User1) or ($_SESSION['UserType']==$User2)) {

}		//End IF statement of user level check
else {
	//Redirects user to login page
	$_SESSION['NotAdmin'] = true;
header('Location: index.php');
	}	//End Else Statement
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/Master.css" rel="stylesheet" type="text/css" />
<link href="css/Menu.css" rel = "stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Register</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
<div id="Holder" >
<div id="Header"></div>
<div id="NavBar">
	<nav>
   		 <ul>
   			 <li> <a href="Admin.php">Account</a></li>
             <li> <a href="AdminUpdatePassword.php">Change Password</a></li>
             <li> <a href="AdminUpgradeUser.php"> Upgrade User</a></li>
             <li><a href="Scripts/Logout_Script.php">Logout</a></li>
   		 </ul>
	</nav>
</div>
<div id="Content">
	<div id ="PageHeading">
	  <h1>Request New Password</h1>
	</div>
	<div id ="ContentLeft">
 
	</div>
    <form action="Scripts/ForgotPassword_AdminScript.php" method="post" >
	<div id="ContentRight">
    <table width="0" border="0">
  <tr>
    <td><span id="sprytextfield1">
    <label for="Email"></label>
    <h2>User Email</h2>
    <br />
    <br />
    <input name="Email" type="text" class="StyleTxtField" id="Email" />
    <span class="textfieldRequiredMsg">Email is required.</span><span class="textfieldInvalidFormatMsg">Invalid email format.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <p>
  <input name="UpdatePassword" type="submit" class="StyleTxtField" id="UpdatePassword" value="Update Password" />
      </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

    
    </div>
    </form>
</div>
<div id="Footer"></div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
</script>
</body>
</html>