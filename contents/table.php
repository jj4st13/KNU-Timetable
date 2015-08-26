<!DOCTYPE html>
<html lang="ko">
<!-- 참고문서
PHP 배열 사용: https://opentutorials.org/course/779/4930
Grid Templete for Bootstrap: http://getbootstrap.com/examples/grid/
테이블 크기 조절: http://stackoverflow.com/questions/4457506/set-the-table-column-width-constant-regardless-of-the-amount-of-text-in-its-cell

-->
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Timetable</h1>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
              <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        전체 강의 목록
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive" style="height: 800px;">
                            <table class="table table-striped table-bordered table-hover td_size">
                                <thead>
                                    <tr>
                                        <th>구분</th>
                                        <th>영역</th>
                                        <th>과목코드</th>
                                        <th>분반</th>
                                        <th>과목명</th>
                                        <th>시수</th>
                                        <th>대상학과 및 학년</th>
                                        <th>대상인원</th>
                                        <th>대학</th>
                                        <th>소속</th>
                                        <th>교번</th>
                                        <th>담당교수</th>
                                        <th>직종</th>
                                        <th>강의실</th>
                                        <th>비고</th>
                                        <th>공학구분</th>
                                    </tr>
                                </thead>
                                <tbody>

<?php

    //HTML 태그 정의
    $tab1 = "                                    ";
    $tab2 = "                                        ";
    $tag1 = "<tr>\n" . $tab2 . "<td>";
    $tag2 = "</td>\n" . $tab2 . "<td>";
    $tag3 = "</td>\n" . $tab1 . "</tr>\n";

    //가져올 데이터 정의
    // $datanum = 3295; // 가져올 데이터의 갯수
    $datanum = 50;
    $datatype = array('type', 'field', 'code', 'classcode', 'lectureName', 'runTime', 'targetDepart', 'targetNum', 'runUniv', 'belongDepart', 'profNum', 'profName', 'profType', 'lecRoom', 'note', 'isEng');
    $dtypenum = 15;

    //로그인 정의
    $mysql_host = "localhost";
    $mysql_login = "loginuser";
    $mysql_pw = "loginpw";
    $mysql_db = "db1";
    $mysql_tb = "knu_lecture_data";

    //MySQL 접속
	$sqlConn = mysql_connect($mysql_host, $mysql_login, $mysql_pw);
	mysql_select_db($mysql_db, $sqlConn);

    //데이터 가져오기 및 표현

    $num=1;
    while($num <= $datanum) {

        $getData = "SELECT * FROM $mysql_tb WHERE num = '$num'";
        $getData = mysql_query($getData);
        $getData = mysql_fetch_array($getData);

        $type = 0;

        echo $tab1 . $tag1;
        while($type < $dtypenum) {
            echo $getData[$datatype[$type]] . $tag2;
            $type++;
        }

        echo $getData[$datatype[$type]] . $tag3;

        $num++;
    }


?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <!-- End  Kitchen Sink -->
            </div>

        </div>

        </div>
    </div>
</body>
</html>
