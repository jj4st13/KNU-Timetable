<?php
session_start();
session_destroy();
echo "<script>alert('로그아웃 되었습니다.');location.replace('/')</script>";
?>
<meta http-equiv='refresh' content='0;url=../index.php'>
