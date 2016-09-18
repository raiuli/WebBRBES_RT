<?php

$configs = include('../config/config.php');
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully \xA". PHP_EOL;
echo "<br />";
$sql = "SELECT Serial, RuleWeight, Antecedent1 FROM RuleBaseForFive";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Serial: " . $row["Serial"]. " - RuleWeight: " . $row["RuleWeight"]. " " . $row["Antecedent1"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
echo "Connection closed";
?>