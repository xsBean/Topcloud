<?php require ('Connections/Connections.php');?>
<?php
@session_start();
/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

if(array_key_exists('UserID', $_SESSION)){

$id = $_SESSION['UserID'];

//UPDATE virtualMachine SET lastUse=NULL WHERE userID=13;
$con -> query("UPDATE virtualMachine SET lastUse=NULL WHERE userID='{$id}'");
?>
	<script type="text/javascript">

		setInterval(function(){ 


			window.location.replace("http://cloud.christophergoulet.net/updateUsage.php"); 


		}, 10000);


	</script>
<?php
}else{
	die();
}



?>