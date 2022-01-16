<?php
$servername = "localhost";
$username = "homestead";
$password = "secret";
$dbname = "unitybackend";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, soz_EN, soz_TR FROM kokler";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - kelime: " . $row["soz_EN"]. " - karşılığı: " . $row["soz_TR"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>