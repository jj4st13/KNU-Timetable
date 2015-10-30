<?php

	// 기존 세션을 종료한다.
	session_start();
	session_destroy();
	echo "<script>alert('로그아웃 되었습니다.');location.replace('/')</script>";
	echo "<meta http-equiv='refresh' content='0;url=../index.php'>";

?>
