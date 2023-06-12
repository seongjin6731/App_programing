<?php
session_start();

$host = 'localhost';
$user = 'admin';
$pw = '1234';
$dbName = 'test';
$mysqli = new mysqli($host, $user, $pw, $dbName);

$id = $_POST['id'];
$name = $_POST['name'];
$dailyAmount = $_POST['dailyAmount'];
$consumedAmount = $_POST['consumedAmount'];

$sql = "INSERT INTO supplements (id, name, dailyAmount, consumedAmount) VALUES ('$id', '$name', '$dailyAmount', '$consumedAmount')";

if ($mysqli->query($sql)) {
  $lastInsertedId = $mysqli->insert_id;
  $response = array('success' => true, 'id' => $lastInsertedId);
} else {
  $response = array('success' => false);
}

mysqli_close($mysqli);

header('Content-Type: application/json');
echo json_encode($response);
?>
