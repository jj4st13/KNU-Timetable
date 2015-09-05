<!--
    [참고자료 목록]
    PHP 쿠키 로그인 구현: http://zetawiki.com/wiki/PHP_%EC%BF%A0%ED%82%A4_%EB%A1%9C%EA%B7%B8%EC%9D%B8_%EA%B5%AC%ED%98%84
    PHP MySQL 로그인 구현: http://kimttotto.tistory.com/24
-->

<?php
    require_once "../lib/regist_check.php";
    require_once="../lib/connect";  //DB정보
    echo "<script>alert('회원가입 폼을 재대로 정확히 채워주세요.');history.back();</script>";
    //모든 정보가 재대로 정의 되어 있는 지 확인!
    if(check_regist_form($_POST['userid'],$_POST['username'],$_POST['userpw'],$_POST['userpw2'],$_POST['email'])==false){
        echo "<script>alert('회원가입 폼을 재대로 정확히 채워주세요.');history.back();</script>";
        exit;
    }

    else{
        //DB객체 생성 및 접속
        $db = new DBC;
        $db->DBI();

        //세션을 사용하기 위해 선언하는 부분
        session_cache_limiter('');
        session_start();

        //아이디와 비밀번호의 값을 POST방식으로 받는 것
        //$id', '$pw', '$token', '$name', 'email', $grade', 'major', $comment'
        $id = $_POST['userid'];
        $pw = $_POST['userpw'];
        $name = $_POST['username'];
        $email = $_POST['email'];
        $grade = $_POST['usergrade'];
        $major = $_POST['major'];
        $comment = $_POST['usercomment'];



        //입력받은 아이디가 존재하는지 체크하기 위해 데이터베이스에서 id를 가져옴
        $db->query = "SELECT id FROM users WHERE id='$id'";
        $db->DBQ();

        $num = $db->result->num_rows;       //결과 값 개수
        $data = $db->result->fetch_row();   //결과 값

        //가입한 회원이 없을때
        if($num==0){
            //64자리의 무작위 문자열을 생성한다.
            //이 64자리의 임의의 수가 바로 토큰으로 로그인 대조에 사용할 키 값.
            $key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789^/';
            for($i=0;$i<=63;$i++)
                $token = $key[rand(0,63)];

            //아이디와 비밀번호 및 기타 정보들을 DB에 등록한다.
            $db->query = "INSERT INTO $dbtable (id, password, token, name, email, grade, major, comment) VALUES ('$id', '$pw', '$token', '$name', '$email', '$grade', '$major', $comment')";
            $db->DBQ();

            if(!$db->result)    //회원가입 실패시
                echo "<script>alert('회원가입에 실패하였습니다.');history.back();</script>";
            else    //회원가입 성공시
                echo "<script>alert('회원가입 되었습니다. 메인화면으로 이동합니다.');</script>";

            //세션에 토큰 즉 키 값을 등록한다.
            $_SESSION['token'] = $token;

            //이름 등 각종 정보를 세션에 저장한다.
            //$_SESSION['desc'] = $comment;
            //$_SESSION['userid'] = $id;
            //$_SESSION['username'] = $name;
        }

        //이미 가입한 회원이 존재할 때때
        else if(($id!="" || $pass!="") && $data[0]!=1){     //회원 정보가 없을 때
            echo "<script>alert('아이디와 비밀번호가 맞지 않습니다.');</script>";
        }

        $db->DBO(); //db접속 종료
        echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
        exit;
    }
?>
