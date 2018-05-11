<?php require ('Connections/Connections.php');?>
<?php
@session_start();
/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting
 * as it comes in. */
ob_implicit_flush();

$address = '192.168.1.201';
$port = 18500;

//Creating the Socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
    
}



$result = socket_connect($socket, $address, $port);
if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    
}

//Send this to Server
$in = "vmReq\r\n";
//Receive this from Server
$out = '';
$receive ='';

//Send VM Request
socket_write($socket, $in, strlen($in));
$in = $_SESSION['UserID'];
sleep(1);
echo $in;
socket_write($socket, $in, strlen($in));


while ($receive = socket_read($socket, 2048)) {
    $out .= $receive;
}
//Remove the stupid Message Received string;
$vmIp = explode("Message Received", $out)[1];
echo "<h1>output: $vmIp</h1>";

//TODO: MAKE SURE TO NOT LINK IF THE MESSAGE IS NOT AN IP

$vmNum = explode('.', $vmIp)[3];

echo "<a href=\"http://www.cloud.christophergoulet.net:65$vmNum/vnc.html?password=12345678\">Link To Viral Machine</a>";
echo "<script type=\"text/javascript\">
	
		window.location = \"http://www.cloud.christophergoulet.net:65$vmNum/vnc.html?autoconnect=true&port=65$vmNum&password=12345678\";

	</script>";
socket_close($socket);




?>



<head></head>

<body>
	
	<h1>Socket Test</h1>

	<p id="updateMe">IP:</p>

</body>
