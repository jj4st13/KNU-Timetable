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
