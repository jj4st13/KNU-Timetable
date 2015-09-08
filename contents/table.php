<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Timetable</h1>
            </div>
        </div>

        <div class="row">
            <!--  시간표 작성 -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>전체 강의 목록</b>
                    </div>

                    <div class="panel-body" style="font-size: 12px">
                        <div class="table-responsive">
                            <table class="table table-condensed table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>신청</th>
                                        <th>구분</th>
                                        <th>분반</th>
                                        <th>과목명</th>
                                        <th>시수</th>
                                        <th>대상학과</th>
                                        <th>정원</th>
                                        <th>담당교수</th>
                                        <th>강의실</th>
                                        <th>비고</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 시간표 출력 -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>시간표</b>
                    </div>

                    <div class="panel-body" style="font-size: 12px">
                        <div class="table-responsive">
                            <table class="table table-condensed table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>구분</th>
                                        <th>월</th>
                                        <th>화</th>
                                        <th>수</th>
                                        <th>목</th>
                                        <th>금</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

$num = 1;
$i = 0;
$tag1 = "                                    ";
$tag2 = "    ";
$tag3 = $tag1 . "<tr>\n" . $tag1 . $tag2 . "<th>\n" . $tag1 . $tag2 . $tag2;
$tag4 = "\n" . $tag1 . $tag2 . "</th>\n" . $tag1 . $tag2 . "<th>\n" . $tag1 . $tag2 . $tag2;
$tag5 = "\n" . $tag1 . $tag2 . $tag2 . "</th>\n";
$tag6 = $tag1 . $tag2 . "</tr>\n";

while($num <= 10) {
    echo $tag3 . $num . "교시"; // tag && 교시

    /**
     * 아직은 아무것도 넣지 않음.
     * 추후 개인 시간표 구현 시 사용
     */
    for($i = 0; $i < 5; $i++) {
        echo $tag4 . "" . $tag5;
    }

    echo $tag6; // end
    $num++;
}

?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- 수강 목록 출력 -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>수강 신청 목록</b>
                    </div>

                    <div class="panel-body" style="font-size: 12px">
                        <div class="table-responsive">
                            <table class="table table-condensed table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>신청</th>
                                        <th>구분</th>
                                        <th>분반</th>
                                        <th>과목명</th>
                                        <th>시수</th>
                                        <th>대상학과</th>
                                        <th>정원</th>
                                        <th>담당교수</th>
                                        <th>강의실</th>
                                        <th>비고</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
