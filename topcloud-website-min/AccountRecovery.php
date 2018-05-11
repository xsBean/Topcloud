<?php require ('Connections/Connections.php'); ?>
<?php 
@session_start();


?>


<!DOCTYPE html>
<html >
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>TopCloud Account Recovery</title>

    <link rel="stylesheet" href="css/AccountRecovery.css">
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/AccountRecovery.js"></script>
  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  </head>

  <body>
    <div class="banner">
      <a href="Login.php"></a> <!-- Links to the sign-in screen -->
    </div>
    <div class="main-content">
      <h1>Having trouble signing in?</h1>
      <form action="Scripts/ForgotPassword_Script.php" method="post">
        <div class="error-msg">
          <p>Please select one of the following options.</p>
        </div>
        <ul>
          <li class="radio-option">
            <label><input type="radio" name="forgot-username" onchange="handleRadioChange('radio1')"  id="radio1"/>I don't know my username</label>
            <div class="unselected-radio-dialog" id="radio-dialog1">
            </div>
          </li>
          <li class="radio-option">
            <label><input type="radio" name="forgot-password" onchange="handleRadioChange('radio2')" id="radio2"/>I don't know my password</label>
            <div class="unselected-radio-dialog" id="radio-dialog2">
              <p>To reset your password, enter the email address you use to sign in to TopCloud.</p>
              <label>Email Address</label>
             <span id="sprytextfield1">
            <label for="Email"></label>
            <input type="text" name="Email" id="Email">
        <span class="textfieldRequiredMsg"><br>Invalid Email.</span><span class="textfieldInvalidFormatMsg"><br>Invalid Email.</span></span>
            </div>
          </li>
          <li class="radio-option">
            <label><input type="radio" name="forgot-email" onchange="handleRadioChange('radio3')" id="radio3"/>I'm having other problems signing in</label>
            <div class="unselected-radio-dialog" id="radio-dialog3">
              <p>Enter the email address you use to sign in to TopCloud.</p>
              <label>Email Address</label>
              <input type="textbox" name="email-address"></input>
            </div>
          </li>
        </ul>
          <div>
            <input type="submit" name="Submit" id="Submit" value="Continue" class="submit-button">
            </div>
      </form>
    </div>
  <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
    </script>
  </body>
</html>
