<!--
  채팅프로그램: uchat
  uchat http://http://uchat.co.kr/
  id = knu
  password = namjin13
  관라지가 나중에 알아서 수정
-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Dashboard</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        채팅
                    </div>
                    <div class="panel-body">
                        <!-- Uchat SECTION START-->
                        <script src='//uchat.co.kr/uchat.php' charset='UTF-8'></script>
                        <script type='text/javascript'>
                            u_chat({
                                room: 'KNUtimetable',
                                skin: '1',
                                chat_record: true,
                                width: '230',
                                height: '500'
                            });
                        </script>
                        <!-- Uchat SECTION END-->
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        달력
                    </div>
                    <div class="panel-body">
                        달력
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
