<!-- MODAL LOGIN SECTION START-->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>

            <div class="modal-body">
                <form method='post' action='login/login.php'>
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
                <h4 class="modal-title" id="myModalLabel">회원가입</h4>
            </div>

            <div class="modal-body">
                <form method='post' action='login/registerHandler.php'>
                    <div class="form-group">
                        <label for="user_id">아이디</label>
                        <input type="id" name="userid" class="form-control" id="userid" placeholder="User ID" />
                    </div>
                    <div class="form-group">
                        <label for="name">이름</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="예: 홍길동" />
                    </div>
                    <div class="form-group">
                        <label for="password">비밀번호</label>
                        <input type="password" name="userpw" class="form-control" id="userpw" placeholder="예: 4~20자리의 숫자,영대/소문자 및 특수기호" />
                    </div>
                    <div class="form-group">
                        <label for="user_num">학번</label>
                        <input type="number" name="usernum" class="form-control" id="usergrade" placeholder="예: 201500000" />
                    </div>
                    <div class="form-group">
                        <label for="user_age">나이</label>
                        <input type="number" name="userage" class="form-control" id="userage" placeholder="예: 20" />
                    </div>
                    <div class="form-group">
                        <label for="user_birth">생일</label>
                        <input type="date" name="userbirth" class="form-control" id="userbirth" placeholder="1996-01-01" />
                    </div>
                    <div class="form-group">
                        <label for="user_id">학년</label>
                        <input type="number" name="usergrade" class="form-control" id="usergrade" placeholder="예: 3" />
                    </div>
                    <div class="form-group">
                        <label for="user_id">자기소개</label>
                        <input type="text" name="usercomment" class="form-control" id="usercomment" placeholder="예: 안녕하세요. 홍길동입니다." />
                    </div>
                    <button type="submit" class="btn btn-warning btn-block"><i class="glyphicon glyphicon-log-in"></i> 가입</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL REGISTER SECTION END-->
