<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

	$host = 'localhost';
	$user = 'admin';
	$pw = '1234';
	$dbName = 'test';
	$mysqli = new mysqli($host, $user, $pw, $dbName);

	$data_title = $_POST['title'];
	$data_title = addslashes($data_title);
    $data_data = $_POST['data'];
    $data_data = addslashes($data_data);
    

	$sql = "insert into data (
			data_title,
			data_data
	)";
	
	$sql = $sql. "values (
			'$data_title',
			'$data_data'
	)";

	if($mysqli->query($sql)){ 
	  echo '<script>alert("success inserting")</script>'; 
	}else{ 
	  echo '<script>alert("fail to insert sql")</script>';
	}

	mysqli_close($mysqli);
  
?>

<script>
	location.href = "data_input2.html";
</script>
</html>