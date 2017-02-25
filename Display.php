<html>
<body style="background-color:powderblue;">
<h1 align="center"><b>Sri Vasavi Remote Data Logging System</b></h1>
<?php
$servername = "localhost";
$username = "root";
$password = "pk";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,sensor1,sensor2,sensor3 FROM SensorValues";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "<b>Temperature:</b>" . $row["sensor2"].  "<b>Humidity: </b>".$row["sensor3"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
