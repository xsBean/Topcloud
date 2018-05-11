<?php
require 'Connections/Connections.php'; 
$inputUserName = $_GET['inputUsers'];
$sql = "SELECT UserName FROM user WHERE UserName like '$inputUsers%' ORDER BY UserName";
$res = $con->query($sql);
//$row = $result-> fetch_array(MYSQLI_BOTH);
if(!$res)
	echo mysqli_error($con);
else
	while($row = $res->fetch_object()) {
		echo "<option value='".$row->UserName."'>";
	}
	echo $row['UserName'];
?>