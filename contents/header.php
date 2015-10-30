<!-- 홈페이지 메뉴 상단 부분 -->
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>KNU 시간표 작성기</title>

    <!-- 부트스트랩 -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />

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
    <!-- 추후 수정 -->
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
                    <img src="assets/img/logo.png" />
                </a>
            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav"> <!-- 로고와 겹침 -->

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
                            <li>
                                <a href="index.php?pageid=dashboard" <?php if(isset($_GET["pageid"]) && $_GET["pageid"]=="dashboard" ) echo "class=\"menu-top-active\""; if(!isset($_GET["pageid"])) echo "class=\"menu-top-active\""; ?>>Dashboard</a></li>
                            <li><a href="index.php?pageid=table" <?php if(isset($_GET["pageid"]) && $_GET["pageid"]=="table" ) echo "class=\"menu-top-active\""; ?>>Time-table</a></li>
                            <li><a href="index.php?pageid=board" <?php if(isset($_GET["pageid"]) && $_GET["pageid"]=="board" ) echo "class=\"menu-top-active\""; ?>>Free board</a></li>
                            <li><a href="index.php?pageid=qna" <?php if(isset($_GET["pageid"]) && $_GET["pageid"]=="qna" ) echo "class=\"menu-top-active\""; ?>>QnA</a></li>
                            <li><a type="button" <?php if(!isset($_SESSION['token'])) echo "data-toggle=\"modal\" href=\"#\" data-target=\"#modal_login\""; else echo "href=\"login/logout.php\""; ?>><?php if(!isset($_SESSION['token'])) echo "login";else echo "logout"; ?></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
