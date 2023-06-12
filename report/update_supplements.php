<?php
session_start();

// 데이터베이스 연결 설정
$host = 'localhost';
$user = 'admin';
$pw = '1234';
$dbName = 'test';
$mysqli = new mysqli($host, $user, $pw, $dbName);

// POST 데이터 가져오기
$supplementName = $_POST['name'];
$consumedAmount = $_POST['consumedAmount'];
$graphId = $_POST['graphId'];

// 데이터베이스 연결 생성
$conn = new mysqli($host, $user, $pw, $dbName);

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// UPDATE 쿼리 실행
$sql = "UPDATE supplements SET consumedAmount = '$consumedAmount' WHERE name = '$supplementName' AND graphId = '$graphId'";

if ($conn->query($sql) === TRUE) {
    $response = array('success' => true);
    echo json_encode($response);
} else {
    $response = array('success' => false, 'error' => $conn->error);
    echo json_encode($response);
}

$conn->close();
?>
