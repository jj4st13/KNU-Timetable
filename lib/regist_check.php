<?php

	// 전체 regist_form 검사
	function check_regist_form($id, $passwd, $passwd2, $name, $email, $comment){
		if(check_id($id) && check_passwd($passwd) && check_retype_passwd($passwd, $passwd2) && check_email($email) && check_comment($comment)){
			return TRUE; // check_name($name) &&
		}
		else
			return FALSE;
	}

	// id를 5~10자의 영문이나 숫자만 허용
	function check_id($id){
		if(!ereg("[[:alnum:]+]{5,10}",$id)) {
			echo "<script>alert('아이디는 5~10자리 영문,숫자만 허용됩니다.');</script>";
			return FALSE;
		}
		return TRUE;
	}

	/*
   // 이름 유효성 검사
	function check_name($name){
		// name에 공백(space)이 있는건 허용하지 않음
		if(!ereg("([^[:space:]]+)", $name) || ereg("([[:space:]]+)",$name)) {
			echo "<script>alert('이름에 공백이 들어가면 안됩니다.');</script>";
			return FALSE;
		}

		// name이 한글일 경우만 허용
		for($i = 0; $i < strlen($name); $i++) {
			if(ord($name[$i]) <= 0x80) {
				return TRUE;
			}
		}

		echo "<script>alert('이름은 한글만 입력하세요');</script>";
		return FALSE;
	}
	*/

	// passwd를 4~8자의 영문이나 숫자만 허용
	function check_passwd($passwd){
		if(!ereg("[[:alnum:]+]{4,8}",$passwd)) {
			echo "<script>alert('비밀번호는 4~8자의 영문이나 숫자만 허용됩니다.');</script>";
			return FALSE;
		}
		return TRUE;
	}

	// passwd를 다시 입력한 것과 이전에 입력한 것이 같은지 체크
	function check_retype_passwd($passwd, $passwd2){
		if($passwd != $passwd2){
			echo "<script>alert('입력한 두 비밀번호가 다릅니다.');</script>";
			return FALSE;
		}

		return TRUE;
	}

	// 입력된 이메일의 유효성검사
	function check_email($email){
		if(!ereg("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+)*@[0-9a-zA-Z-]+(\.[0-9a-zA-Z-]+)*$)", $email)) {
			echo "<script>alert('올바른 이메일 형식을 입력하세요');</script>";
			return FALSE;
		}
		return TRUE;
	}

	function check_comment($msg){
		if(mb_strlen($msg,"utf-8")<=30)
			return TRUE;
		echo "<script>alert('자기소개는 30자 이하로 입력해주세요.');</script>";
		return FALSE;
	}

?>
