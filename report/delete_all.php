<?php
session_start();

$host = 'localhost';
$user = 'admin';
$pw = '1234';
$dbName = 'test';
$mysqli = new mysqli($host, $user, $pw, $dbName);

$sql = "DELETE FROM supplements";

if ($mysqli->query($sql)) {
  $response = array('success' => true);
} else {
  $response = array('success' => false);
}

mysqli_close($mysqli);

header('Content-Type: application/json'); // JSON 응답을 명시
echo json_encode($response);
?>
