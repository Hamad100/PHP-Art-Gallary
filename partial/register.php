<div class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" id="myregister" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">REGISTER</h4>
            </div>
            <div class="modal-body">

                <form action="" method="post">

                    <div class="form-group">
                        <label class="form-control-label" for="fullname">Full Name</label> <br><br>
						<div class = "error"><?php echo $nameerror; ?></div>
                        <input class="form-control" type="text" name="fullname" id="fullname" value="<?php $fullname; ?>" placeholder="fullname">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="username">Username</label> <br><br><br><br>
						<div class = "error"><?php echo $usernameerror; ?></div>
                        <input class="form-control" type="text" name="username" id="username" value="<?php $username; ?>" placeholder="username...">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="email">Email</label> <br><br><br><br>
						<div class = "error"><?php echo $emailerror; ?></div>
                        <input class="form-control" type="email" name="email" id="email" value="<?php $email; ?>" placeholder="email...">
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="password">Password</label> <br><br><br><br>
						<div class = "error"><?php echo $passworderror; ?></div>
                        <input class="form-control" type="password" name="password" id="password" value="<?php $password; ?>" placeholder="password...">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="password">Confirm Password</label> <br><br><br><br>
						<div class = "error"><?php echo $confirmpassworderror; ?></div>
                        <input class="form-control" type="password" name="confirmpassword" id="password" value="<?php $confirmpassword; ?>" placeholder="password...">
                    </div>

                    <br>
                     <button type="submit" name="btnSubmit" class="btn btn-warning col-xs-12">Register</button>
                </form>

            </div> 
            <br><br>
            <div class="modal-footer">

                 <p class="text-center">Already have an account? <a href="#" data-target="#mylogin" data-toggle="modal" data-dismiss="modal">Login</a></p>

            </div>

        </div>
    </div>
</div>