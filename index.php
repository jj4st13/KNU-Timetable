<?php

    // 각 페이지별 파일 위치
    $header = "contents/header.php";
    $footer = "contents/footer.html";           // 미구현 상태
    $modal = "lib/modal.php";

    $dashboard = "contents/dashboard.html";     // 미구현 상태
    $table = "contents/table.php";
    $board = "contents/board.html";             // 미구현 상태
    $qna = "contents/qna.html";                 // 미구현 상태

	// 에러 발생시 리포트(반환)
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	// 세션 시작
	if(!isset($_SESSION))
		session_start();

	// 상단 페이지 로드 (Header)
	require_once $header;

	// 각 명시된 위치에 맞는 페이지 로드
	if(!isset($_GET["pageid"]) || $_GET["pageid"]=="dashboard")
		require_once $dashboard;
	else if($_GET["pageid"]=="table")
		require_once $table;
	else if($_GET["pageid"]=="board")
		require_once $board;
	else if($_GET["pageid"]=="qna")
		require_once $qna;

	// 모달 로그인 페이지 로드
	require_once $modal;

	// 하단 페이지 로드 (Footer)
	require_once $footer;

?>
