<!--
    [참고자료 목록]
    PHP 쿠키 로그인 구현: http://zetawiki.com/wiki/PHP_%EC%BF%A0%ED%82%A4_%EB%A1%9C%EA%B7%B8%EC%9D%B8_%EA%B5%AC%ED%98%84
    PHP MySQL 로그인 구현: http://kimttotto.tistory.com/24
-->

<?php
    //user_id와 user_pw가 정의 되어있는지 확인하는 부분
    if(!isset($_POST['userid']) || !isset($_POST['userpw'])) { // POST의 name을 가져옴.
        echo "제대로 정의되지 않았습니다.";
        exit;
    }

	//세션을 사용하기 위해 선언하는 부분
	session_cache_limiter('');
	session_start();

	//데이터베이스에 접근하기 위한 부분
	$dbid = "loginuser";
	$dbpass = "loginpw";
	$dbname ="db1";
	$dbhost = "localhost";

	$sqlConn = mysql_connect($dbhost, $dbid, $dbpass);
	mysql_select_db($dbname, $sqlConn);

	//아이디와 비밀번호의 값을 POST방식으로 받는 것
	$id = $_POST['userid'];
	$name = $_POST['username'];
	$pass = $_POST['userpw'];

	//입력받은 id가 이미 존재하는지 체크
	$getID = "SELECT id FROM usertest1 WHERE id='$id'";
	$getID = mysql_query($getID);
	$getID = mysql_fetch_array($getID);

	//아이디가 있다면
	if($getID['id']) {
        $result = "ID EXISTS!";
	} else { // ID가 존재하지 않는 경우

		//아이디와 비밀번호 및 기타 정보들을 DB에 등록한다.
		$setDATA = "INSERT INTO usertest1 (num, id, password, token, name, age, birthdate, grade, comment) VALUES (NULL, '$id', '$pw', NULL, '$name', NULL, NULL, NULL, NULL)";
        mysql_query($setDATA);

		//64자리의 무작위 문자열을 생성한다.
		//이 64자리의 임의의 수가 바로 토큰으로 로그인 대조에 사용할 키 값.
		$key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789^/';
		for($i=0;$i<=63;$i++)
            $token = $key[rand(0,63)];

        //방금 만든 토큰을 데이터베이스에 업데이트한다.
		//입력받은 아이디가 있는 위치에 업데이트.
		$updateToken = "UPDATE usertest1 SET token='$token' WHERE id='$id'";
		$updateToken = mysql_query($updateToken);

        //세션에 토큰 즉 키 값을 등록한다.
		$_SESSION['token'] = $token;

        //이름 등 각종 정보를 세션에 저장한다.
        $_SESSION['desc'] = $desc;
        $_SESSION['userid'] = $id;
        $_SESSION['username'] = $name;

        //홈 페이지로 리디렉트 후 종료한다.
        echo "<meta http-equiv='refresh' content='0;url=../contents/index.php'>";

	}

    echo $result;
    return 1;
?>