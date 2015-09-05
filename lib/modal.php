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
                    <button type="button" data-toggle="modal" data-target="#modal_register" class="btn btn-success btn-block"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Sign up</button>
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

            <form method='post' action='../login/registerHandler.php'>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_id">아이디</label>
                        <input type="id" name="userid" class="form-control" id="userid" placeholder="User ID" />
                    </div>
                    <div class="form-group">
                        <label for="password">비밀번호</label>
                        <input type="password" name="userpw" class="form-control" id="userpw" placeholder="예: 4~20자리의 숫자,영대/소문자 및 특수기호" />
                    </div>
                    <div class="form-group">
                        <label for="password">다시 입력</label>
                        <input type="password" name="userpw2" class="form-control" id="userpw2" placeholder="비밀번호 다시 입력" />
                    </div>
                    <div class="form-group">
                        <label for="name">이름</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="예: 홍길동" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="email@Email.com" />
                    </div>
                    <div class="form-group form-inline">
                        <div class="input-group">
                            <div class="input-group-addon">학&nbsp; &nbsp;년</div>
                            <select class="form-control " name="usergrade" id="usergrade">
                                <?php for($i = 1; $i <= 4; $i++){
                                    echo "<option value=".$i.">".$i."</option>";
                                }?>
                            </select>
                        </div>
                        <div class="input-group col-sm-offset-3">
                            <div class="input-group-addon">학&nbsp; &nbsp; 과</div>
                            <select class="form-control" name="major" id="major">
                                <?php
                                    //DB에서 학과만 뽑아내야함
                                    //길이는 알아서 늘어남
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id">자기소개</label>
                        <textarea class="form-control" name="usercomment" id="usercomment" rows="2" placeholder="예: 안녕하세요. 홍길동입니다."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-log-in"></i> sign up</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL REGISTER SECTION END-->
