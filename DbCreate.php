<?php
$servername = "localhost";
$username = "root";
$password = "pk";
$dbname = "myDB";
$sock = socket_create(AF_INET, SOCK_STREAM, 0);
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
//$sql = "INSERT INTO MyGuests (sensor1)VALUES ('$input')";
$sql = "CREATE TABLE SensorValues(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
sensor1 VARCHAR(30) NOT NULL,
sensor2 VARCHAR(30) NOT NULL,
sensor3 VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP)";
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

		if ($conn->query($sql) === TRUE) 
		{
			echo "New record created successfully";
		} 
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

?>

