<?php

		$host = 'localhost';
		$user = 'admin';
		$pw = '1234';
		$dbName = 'test';
		$mysqli = new mysqli($host, $user, $pw, $dbName);

		$member_email = $_POST['email'];
	    $member_pw_1 = $_POST['pw_1'];
	    $member_name = $_POST['name'];
		$member_Phone = $_POST['Phone'];

		$sql = "insert into mc (
				member_email,
				member_pw_1,
				member_name,
				member_Phone
		)";
		
		$sql = $sql. "values (
				'$member_email',
				'$member_pw_1',
				'$member_name',
				'$member_Phone'
		)";

		if($mysqli->query($sql)){
			$_SESSION['email'] = $member_email; // 로그인한 사용자의 이메일을 세션에 저장
		  echo '<script>alert("회원가입 성공")</script>';
		}else{ 
		  echo '<script>alert("회원가입 실패")</script>';
		}

		mysqli_close($mysqli);
	  
	?>

<script>
	location.href = "login.html";
</script>

</html>