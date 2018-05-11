<?php require 'Connections/localhost.php'; ?>
<?php
session_start();
//Variable to store user level
$User=2;

//Query to run to get user level form databse
$sql =mysql_query("SELECT * FROM user WHERE UserLevel = '{$User}'");

//Store the user level from the database after query
$UserLevel['UserType'] = $sql['UserLevel'];


//If the user session is of the specified $UserLevel and $User then allow access  
if ($_SESSION['UserType']==$User) {

}		//End IF statement of user level check
else {
	//Redirects user to login page
	$_SESSION['NotAdmin'] = true;
header('Location: Admin.php');
	}	//End Else Statement
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/Master.css" rel="stylesheet" type="text/css" />
<link href="css/Menu.css" rel = "stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Register</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>

<body>
<div id="Holder" >
<div id="Header"></div>
<div id="NavBar">
	<nav>
   		 <ul>
   			<li> <a href="Admin.php">Account</a></li>
             <li> <a href="AdminUpdatePassword.php">Update Password</a></li>
             <li> <a href="AdminUpgradeUser.php"> Upgrade User</a></li>
             <li><a href="Scripts/Logout_Script.php">Logout</a></li>
   		 </ul>
	</nav>
</div>
<div id="Content">
	<div id ="PageHeading">
	  <h1>Upgrade User</h1>
	</div>
	<div id ="ContentLeft">
    <!-- If user is successfullupgraded -->
	 <?php if (isset($_SESSION['upgraded'])==true) { ?>
     <a style="color:#F00"><h3> User successfully upgraded </h3></a>
     <?php unset ($_SESSION['upgraded']); }?>
     <!--End upgrade -->
     
     <?php if (isset($_SESSION['noUser'])==true) { ?>
     <a style="color:#F00" ><h3> User does not exist </h3></a>
     <?php unset ($_SESSION['noUser']); }?>
     
	</div>

	<form id="UpgradeUser" name="UpgradeUser" method="post" action="Scripts/UpgradeUser_Script.php">	
    <div id="ContentRight">
    <table width="0" border="0">
  <tr>
    <td><span id="sprytextfield1">
    <label for="UserEmail"></label>
    <h2> User Email</h2>
    <br />
    <br />
    <input name="UserEmail" type="text" class="StyleTxtField" id="UserEmail" />
    <span class="textfieldRequiredMsg">An email is required!</span><span class="textfieldInvalidFormatMsg">Invalid email format.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span id="spryselect1">
      <label for="UpgradeLevel"></label>
     <h2> Select Upgrade Type:</h2><br />
      <br />
      <select name="UpgradeLevel" class="StyleTxtField" id="UpgradeLevel">
        <option value="1">Student</option>
        <option value="3">Professor</option>
        <option value="2">Administrator</option>
    </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="UpgradeUser" type="submit" class="StyleTxtField" id="UpgradeUser" value="Upgrade User" /></td>
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
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>
</body>
</html>