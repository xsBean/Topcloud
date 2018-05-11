<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Master.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel = "stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Register</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
<div id="Holder" >
<div id="Header"></div>
<div id="NavBar">
	<nav></nav>
</div>
<div id="Content">
	<div id ="PageHeading">
	  <h1>&nbsp;</h1>
	</div>
	<div id ="ContentLeft">
	  <h2>&nbsp;</h2>
	</div>
	<div id="ContentRight">
	  <form id="ForgortPassword" name="ForgortPassword" method="post" action="Test.php">
     
	    <h6><span id="sprytextfield1">
	      <label for="Email"></label>
	    <h1>  Enter Email:</h1>
	      <br />
	      <br />
  <input name="Email" type="text" class="StyleTxtField" id="Email" />
	      </span></h6>
	    <p>
	      <input name="Submit" type="submit" class="StyleTxtField" id="Submit" value="Forgot Password" />
	    </p>
	    <span><span class="textfieldRequiredMsg">A value is required.</span></span>
      </form>
	</div>
</div>
<div id="Footer"></div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>