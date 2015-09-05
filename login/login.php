<!--
    [참고자료 목록]
    PHP 쿠키 로그인 구현: http://zetawiki.com/wiki/PHP_%EC%BF%A0%ED%82%A4_%EB%A1%9C%EA%B7%B8%EC%9D%B8_%EA%B5%AC%ED%98%84
    PHP MySQL 로그인 구현: http://kimttotto.tistory.com/24
-->

<?php
    require_once "../lib/connect.php";

    //user_id와 user_pw가 정의 되어있는지 확인하는 부분
    if(!isset($_POST['userid']) || !isset($_POST['userpw'])) { // POST의 name을 가져옴.
        echo "<script>alert('아이디와 비밀번호를 입력해 주세요.');</script>";
        exit;
    }

    //DB객체 생성 및 접속
    $db = new DBC;
    $db->DBI();

	//세션을 사용하기 위해 선언하는 부분
	session_start();

	//아이디와 비밀번호의 값을 POST방식으로 받는 것
	$id = $_POST['userid'];
	$pass = $_POST['userpw'];

	//입력받은 아이디가 존재하는지 체크하기 위해 데이터베이스에서 id를 가져옴
	$db->query = "SELECT id password FROM users WHERE id='$id' and password='$pass'";
	$db->DBQ();

    $num = $db->result->num_rows;       //결과 값 개수
    $data = $db->result->fetch_row();   //결과 값

    //회원 정보가 있을 때
    if($num==1){
        //64자리의 무작위 문자열을 생성한다.
		//이 64자리의 임의의 수가 바로 토큰으로 로그인 대조에 사용할 키 값.
		$key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789^/';
        for($i=0;$i<=63;$i++)
            $token .= $key[rand(0,63)];

        //방금 만든 토큰을 데이터베이스에 업데이트한다.
        //입력받은 아이디가 있는 위치에 업데이트.
        $db->query = "UPDATE users SET token='$token' WHERE id='$id'";
        $db->DBQ();

        //세션에 토큰 즉 키 값을 등록한다.
        $_SESSION['token'] = $token;
        $_SESSION['userid'] = $id;
    }

    else{     //회원 정보가 없을 때
        echo "<script>alert('아이디와 비밀번호가 맞지 않습니다.');</script>";
    }

    $db->DBO();
    echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
    exit;
?>
