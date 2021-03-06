<!--
	[참고자료 목록]
	PHP 쿠키 로그인 구현: http:// zetawiki.com/wiki/PHP_%EC%BF%A0%ED%82%A4_%EB%A1%9C%EA%B7%B8%EC%9D%B8_%EA%B5%AC%ED%98%84
	PHP MySQL 로그인 구현: http:// kimttotto.tistory.com/24
-->

<?php
	require_once "../lib/regist_check.php";
	require_once "../lib/connect.php";

	// 모든 정보가 재대로 정의 되어 있는 지 확인!
	if(!check_regist_form($_POST['userid'], $_POST['userpw'], $_POST['userpw2'], $_POST['username'], $_POST['email'], $_POST['comment'])){
		echo "모든 정보가 제대로 정의되지 않았습니다.";
		exit;
	}

	else{
		// DB객체 생성 및 접속
		$db = new DBC;
		$db->DBI();

		// 세션을 사용하기 위해 선언하는 부분
		session_cache_limiter('');
		session_start();

		// 아이디와 비밀번호의 값을 POST방식으로 받는 것
		// $id', '$pw', '$token', '$name', 'email', $grade', 'major', $comment'
		$id = $_POST['userid'];
		$pw = $_POST['userpw'];
		$name = $_POST['username'];
		$email = $_POST['email'];
		$grade = $_POST['usergrade'];
		$major = $_POST['major'];
		$comment = $_POST['comment'];
        $token = '';
        $key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
        for($i=0;$i<64;$i++)
            $token .= $key[rand(0,69)];
        $token = md5($token);
		// 입력받은 아이디가 존재하는지 체크하기 위해 데이터베이스에서 id를 가져옴
		$db->query = "SELECT id FROM knu_users_list WHERE id='$id'";
		$db->DBQ();

		$num = $db->result->num_rows;	   // 결과 값 개수

		// 가입한 회원이 없을때
		if($num==0){
			/*
			(knu_users_list.sql 참조)
			+-----------+-------------+------+-----+---------+-------+
			| Field     | Type        | Null | Key | Default | Extra |
			+-----------+-------------+------+-----+---------+-------+
			| id        | varchar(20) | YES  |     | NULL    |       |
			| password  | binary(60)  | YES  |     | NULL    |       |
			| token     | binary(64)  | YES  |     | NULL    |       |
			| name      | varchar(20) | YES  |     | NULL    |       |
			| email     | text        | YES  |     | NULL    |       |
			| grade     | int(11)     | YES  |     | NULL    |       |
			| majorcode | int(11)     | YES  |     | NULL    |       |
			| comment   | text        | YES  |     | NULL    |       |
			+-----------+-------------+------+-----+---------+-------+
			8 rows in set (0.00 sec)
			*/

			// 패스워드 암호화
			$hash = password_hash($pw, PASSWORD_DEFAULT);

			// 아이디와 비밀번호 및 기타 정보들을 DB에 등록한다.
			$db->query = "INSERT INTO knu_users_list (id, password, token, name, email, grade, majorcode, comment) VALUE ('$id', '$hash', '$token', '$name', '$email', '$grade', '$major', '$comment')";
			$db->DBQ();

			if(!$db->result)	// 회원가입 실패시
				echo "<script>alert('회원가입에 실패하였습니다. 관리자에게 문의하세요.');history.back();</script>";

			else{	// 회원가입 성공시
				echo "<script>alert('회원가입 되었습니다. 메인화면으로 이동합니다.');</script>";


				// 세션에 토큰 즉 키 값을 등록한다.
				$_SESSION['token'] = $token;

				// 이름 등 각종 정보를 세션에 저장한다.
				$_SESSION['userid'] = $id;
				// $_SESSION['desc'] = $comment;
				// $_SESSION['username'] = $name;
			}
		}

		// 이미 가입한 회원이 존재할 때때
		else{
			echo "<script>alert(''$id'로 가입한 회원이 존재합니다.');</script>";
			echo "<script>history.back();</script>";
			exit;
		}

		$db->DBO(); // db접속 종료
	}

	echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
	exit;
?>
