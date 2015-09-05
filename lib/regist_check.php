<?php
    //전체 regist_form 검사
    function check_regist_form($id, $passwd, $passwd2, $name, $email, $comment){
        if(check_id($id) && check_name($name) && check_passwd($passwd) && check_email($email) && check_comment($comment))
            return TRUE;
        else
            return FALSE;
    }

    //id를 5~10자의 영문이나 숫자만 허용
    function check_id($id){
        if(!ereg("[[:alnum:]+]{5,10}",$id)) {
            return FALSE;
        }
        return TRUE;
    }

   //이름 유효성 검사
    function check_name($name){
        //name에 공백(space)이 있는건 허용하지 않음
        if(!ereg("([^[:space:]]+)", $name) || ereg("([[:space:]]+)",$name)) {
            return FALSE;
        }

        // name이 한글일 경우만 허용
        for($i = 0; $i < strlen($name); $i++) {
            if(ord($name[$i]) <= 0x80) {
                return TRUE;
            }
        }
        return FALSE;
    }

    // passwd를 4~8자의 영문이나 숫자만 허용
    function check_passwd($passwd){
        if(!ereg("[[:alnum:]+]{4,8}",$passwd)) {
            return FALSE;
        }
        return TRUE;
    }

    //passwd를 다시 입력한 것과 이전에 입력한 것이 같은지 체크
    function check_retype_passwd($passwd, $passwd2){
        if($passwd != $passwd2)
            return FALSE;

        return TRUE;
    }

    //입력된 이메일의 유효성검사
    function check_email($email){
        if(!ereg("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+)*@[0-9a-zA-Z-]+(\.[0-9a-zA-Z-]+)*$)", $email)) {
            return FALSE;
        }
        return TRUE;
    }

    function check_comment($msg){
        if(mb_strlen($msg,"utf-8")<=30)
            return TRUE;
        return FALSE;
    }
?>
