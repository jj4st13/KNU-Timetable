<!DOCTYPE html>
<html lang="ko">
<!-- 참고문서
    iframe auto-resizing: http://naradesign.net/wp/2007/12/12/129/
    html상 js 변수사용: http://blog.naver.com/PostView.nhn?blogId=mr_chun&logNo=51962426
    jQuery를 이용한 iframe 크기 자동 조정 스크립트: http://tipsbox.tistory.com/entry/%EC%9E%90%EB%B0%94%EC%8A%A4%ED%81%AC%EB%A6%BD%ED%8A%B8-iframe-%EB%82%B4%EC%9A%A9%EC%97%90-%EB%94%B0%EB%9D%BC-%ED%81%AC%EA%B8%B0-%EC%9E%90%EB%8F%99-%EC%A1%B0%EC%A0%88
-->

<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>KNU 시간표 작성기</title>

    <!-- 부트스트랩 -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- FONT AWESOME ICONS  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />

    <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
    <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- HEADER START-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END-->




    <!-- LOGO HEADER START-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="../assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="../assets/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <?php
                                            session_start();
                                            if(!isset($_SESSION['username']) || !isset($_SESSION['userid'])) echo "Not Logged In";
                                            else echo $_SESSION['username'];
                                            ?>
                                        </h4>

                                        <h5>
                                            <?php
                                            if(isset($_SESSION['username']) && isset($_SESSION['userid'])) echo $_SESSION['userid'];
                                            ?>
                                        </h5>

                                    </div>
                                </div>
                                <hr/>
                                    <h5><strong>한줄소개 : </strong></h5>
                                    <?php
                                    if(isset($_SESSION['username']) && isset($_SESSION['userid'])) echo $_SESSION['desc'];
                                    ?>
                                <hr/>
                                    <!-- 풀 프로파일은 아직 보류
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp;
                                -->
                                <?php if(isset($_SESSION['username']) && isset($_SESSION['userid'])) echo "<a href=\"../login/logout.php\" class=\"btn btn-danger btn-sm\">Logout</a>"; else echo "<a data-toggle=\"modal\" href=\"#\" data-target=\"#modal_login\" class=\"btn btn-info btn-sm\">Login</a>";?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->




    <!-- MENU SECTION START-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php?pageid=dashboard" <?php if(isset($_GET[ "pageid"]) && $_GET[ "pageid"]=="dashboard" ) echo "class=\"menu-top-active\""; if(!isset($_GET[ "pageid"])) echo "class=\"menu-top-active\""; ?>>Dashboard</a></li>
                            <li><a href="index.php?pageid=table" <?php if(isset($_GET[ "pageid"]) && $_GET[ "pageid"]=="table" ) echo "class=\"menu-top-active\""; ?>>Time-table</a></li>
                            <li><a href="index.php?pageid=board" <?php if(isset($_GET[ "pageid"]) && $_GET[ "pageid"]=="board" ) echo "class=\"menu-top-active\""; ?>>Free board</a></li>
                            <li><a href="index.php?pageid=qna" <?php if(isset($_GET[ "pageid"]) && $_GET[ "pageid"]=="qna" ) echo "class=\"menu-top-active\""; ?>>QnA</a></li>
                            <li><a type="button" <?php if(!isset($_SESSION[ 'userid'])) echo "data-toggle=\"modal\ " href=\"#\ " data-target=\"#modal_login\""; else echo "href=\"../login/logout.php\""; ?>><?php if(!isset($_SESSION['userid'])) echo "login"; else echo "logout"?></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->

    <!-- IFRAME AUTO-RESIZER USING JQUERY-->
    <script>
        function setIFrameHeight(obj) {
            if (obj.contentDocument) {
                obj.height = obj.contentDocument.body.offsetHeight + 40;
            } else {
                obj.height = obj.contentWindow.document.body.scrollHeight;
            }
        }
    </script>

    <!-- CONTENTS SECTION START-->
    <iframe src=<?php if(isset($_GET[ "pageid"])) echo $_GET[ "pageid"]; else echo "dashboard"; ?>.php frameborder=0 width="100%" height="100%" scrolling=no onLoad="setIFrameHeight(this)">이 브라우저는 iframe을 지원하지 않습니다.</iframe>




    <!-- CONTENTS SECTION END-->





    <!-- FOOTER SECTION START-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>컴퓨터정보통신공학11 김남진&nbsp;&nbsp;Email: </strong>jj4st13@gmail.com&nbsp;&nbsp;|&nbsp;&nbsp;
                    <strong>컴퓨터정보통신공학15 안정인&nbsp;&nbsp;Email: </strong>ji5489@gmail.com
                    <br>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->


    <!-- MODAL LOGIN SECTION START-->
    <div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>

                <div class="modal-body">
                    <form method='post' action='../login/login.php'>
                        <div class="form-group">
                            <label for="user_id">user ID</label>
                            <input type="id" name="userid" class="form-control" id="userid" placeholder="User ID" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="userpw" class="form-control" id="userpw" placeholder="Password" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Login</button>
                        <button type="button" data-toggle="modal" data-target="#modal_register" class="btn btn-success btn-block"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Sign in</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL LOGIN SECTION END-->

    <!-- MODAL REGISTER SECTION START-->
    <div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Register</h4>
                </div>

                <div class="modal-body">
                    <form method='post' action='../login/registerHandler.php'>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" name="username" class="form-control" id="username" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <label for="user_id">user ID</label>
                            <input type="id" name="userid" class="form-control" id="userid" placeholder="User ID" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="userpw" class="form-control" id="userpw" placeholder="Password" />
                        </div>
                        <button type="submit" class="btn btn-warning btn-block"><i class="glyphicon glyphicon-log-in"></i> Register</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL REGISTER SECTION END-->

    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>
