<?php require '../Connections/Connections.php'; ?>
<?php 


@session_start();
$_SESSION['end'] = "Yes";
//Removes session for the user
unset($_SESSION['UserID']);
//Destroys session when user clicks logout
session_destroy();
header('Location: ../index.php');

?>

