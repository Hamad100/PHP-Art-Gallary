<div class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" id="mylogin" tabindex="-1">
    <div class="modal-dialog modal-sm dialog1">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">LOGIN</h4>
            </div>
            <div class="modal-body">

                <form action="" method="post">

                    <div class="form-group">
                        <label class="form-control-label" for="username">Username</label><br><br>
						<div class = "error"><?php echo $usernameLogError; ?></div>
                        <input class="form-control" type="text" name="usernameLog" id="username" value="<?php $usernameLog; ?>" placeholder="username...">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="password">Password</label><br><br><br><br>
						<div class = "error"><?php echo $passwordLogError; ?></div>
                        <input class="form-control" type="password"  name="passwordLog" id="password" value="<?php $passwordLog; ?>" placeholder="password..."><br><br><br>
						<div class = "error"><?php  ?></div>
                    </div>
                   
                    
                     <button type="submit" name="btnLogin" class="btn btn-warning col-xs-12">Login</button>
                </form>

            </div> 

            <br><br>
            <div class="modal-footer">

                <p class="text-center">Don't have an account?  <a href="#" data-target="#myregister" data-toggle="modal" data-dismiss="modal">Register</a></p>

            </div>

        </div>
    </div>
</div>