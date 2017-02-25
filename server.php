<?php
set_time_limit (0);
$address = '172.31.24.150';
$port = 8080;
$servername = "localhost";
$username = "root";
$password = "pk";
$dbname = "myDB";
$sock = socket_create(AF_INET, SOCK_STREAM, 0);
echo "PHP Socket Server started at " . $address . " " . $port . "\n";
socket_bind($sock, $address, $port) or die('Could not bind to address');
socket_listen($sock,10);
while (true)
{
        $client = socket_accept($sock);
        $input = socket_read($client, 1024);
	$sensor1=substr($input,3,3);
	$sensor2=substr($input,6,3);
        socket_write($client, "Received is  " . $input . "\n");
       echo "Received is ".$input;
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO SensorValues (sensor1, sensor2,sensor3, email)
VALUES ('$input', '$sensor1','$sensor2', 'example@gmail.com')";

		if ($conn->query($sql) === TRUE) 
		{
			echo "New record created successfully";
		} 
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
        socket_close($client);
}
socket_close($sock);
?>

