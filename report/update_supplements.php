<?php
session_start();

$host = 'localhost';
$user = 'admin';
$pw = '1234';
$dbName = 'test';
$mysqli = new mysqli($host, $user, $pw, $dbName);

$name = $_POST['name'];
$consumedAmount = $_POST['consumedAmount'];

// 기존 데이터 확인
$existingDataQuery = "SELECT * FROM supplements WHERE name='$name'";
$existingDataResult = $mysqli->query($existingDataQuery);

if ($existingDataResult->num_rows > 0) {
  $row = $existingDataResult->fetch_assoc();
  $dailyAmount = $row['dailyAmount'];

  // 기존 데이터가 있는 경우 dailyAmount과 consumedAmount 업데이트
  $updateQuery = "UPDATE supplements SET dailyAmount='$dailyAmount', consumedAmount='$consumedAmount' WHERE name='$name'";

  if ($mysqli->query($updateQuery)) {
    $response = array('success' => true);
  } else {
    $response = array('success' => false, 'error' => $mysqli->error);
  }
} else {
  // 기존 데이터가 없는 경우 새로운 데이터 삽입
  $insertQuery = "INSERT INTO supplements (name, dailyAmount, consumedAmount) VALUES ('$name', 0, '$consumedAmount')";

  if ($mysqli->query($insertQuery)) {
    $response = array('success' => true);
  } else {
    $response = array('success' => false, 'error' => $mysqli->error);
  }
}

mysqli_close($mysqli);

header('Content-Type: application/json');
echo json_encode($response);
?>