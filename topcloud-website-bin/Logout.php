<?php require 'Connections/Connections.php'; ?>
<?php 


@session_start();
$_SESSION['end'] = "Yes";
//Removes session for the user
unset($_SESSION['UserID']);
//Destroys session when user clicks logout
session_destroy();
header('Location: index.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Master.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel = "stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Logout</title>
</head>

<body>
<div id="Holder" >
  <div id="Header"></div>
  <div id="NavBar">
    <nav> </nav>
  </div>
  <div id="Content">
    <div id ="PageHeading">
      <h1>&nbsp;</h1>
    </div>
    <div id ="ContentLeft">
      <h2>You have logged out succesfully !</h2>
    </div>
    <div id="ContentRight"></div>
  </div>
  <div id="Footer"></div>
</div>
</body>
</html>