<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
    if(!isset($_SESSION)){
        session_start();
    }

    //include_once "./lib/connect.php";       //db연결
    require_once "./contents/upper.php";    //상단
    if(!isset($_GET[ "pageid"]) || $_GET[ "pageid"]=="dashboard")
        require_once "./contents/dashboard.php";
    else if(isset($_GET[ "pageid"]) && $_GET[ "pageid"]=="table")
        require_once "./contents/table.php";
    else if(isset($_GET[ "pageid"]) && $_GET[ "pageid"]=="board")
        require_once "./contents/board.php";
    else if(isset($_GET[ "pageid"]) && $_GET[ "pageid"]=="qna")
        require_once "./contents/qna.php";
    require_once "./lib/modal.php";         // 모달 로그인
?>

    <!-- FOOTER SECTION START-->
    <footer>
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    Copyright &copy; 2015 김남진,안정인 All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->



    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="./assets/js/bootstrap.min.js"></script>
    </body>
</html>
