<?php
session_start();

$host = 'localhost';
$user = 'admin';
$pw = '1234';
$dbName = 'test';
$mysqli = new mysqli($host, $user, $pw, $dbName);

// 데이터베이스 연결 확인
if ($mysqli->connect_errno) {
  die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM supplements";
$result = $mysqli->query($sql);

$supplements = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $supplement = array(
      'name' => $row['name'],
      'dailyAmount' => $row['dailyAmount'],
      'consumedAmount' => $row['consumedAmount']
    );
    array_push($supplements, $supplement);
  }
}

mysqli_close($mysqli);

header('Content-Type: application/json');
echo json_encode($supplements);
?>
