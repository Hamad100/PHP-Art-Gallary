<?php session_start(); ?>
<?php 
	if($_SESSION['username'] == null){
		header("Location: http://f6team2.gblearn.com/project/index.php");
		exit;
	}

?>
<?php include("controller/sendemail.php"); ?>
<?php include("partial/header.php"); ?>
<?php include("partial/navigation.php"); ?>



<section class="contact-banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 skills-col-1 home-col-1 text-uppercase">

                    Contact
    
            </div>
        </div>
    </div>
</section>

 <div class="container contact">
    <div class="row relative">
        <div class="col-sm-12">
            
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h4><?php echo $success; ?></h4>
            <form action="#" method="POST">
                        <div class="form-group">
                             <label for="name">Name</label><br><br><br>
                            <div class ="error"><?php echo $nameerror; ?></div>
                             <input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>" placeholder="Full name...">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label><br><br><br><br>
                            <div class = "error"><?php echo $emailerror; ?></div>
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label><br><br><br><br>
                            <div class = "error"><?php echo $phoneerror; ?></div>
                            <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $phone; ?>" placeholder="Phone Number...">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label><br><br><br><br>
                            <div class = "error"><?php echo $subjecterror; ?></div>
                            <input class="form-control" type="text" name="subject" id="subject" value="<?php echo $subject; ?>" placeholder="subject...">
                        </div>
                        <div class="form-group">
                            <label for="comment">Message</label><br><br><br><br>
                            <div class = "error"><?php echo $commenterror; ?></div>
                            <textarea class="form-control" name="comment" id="comment" rows="8" value="<?php echo $comment; ?>" placeholder="Comment..."></textarea>
                        </div>
                            <input type="submit" name="contact" class="btn btn-warning" value="Submit" style="margin-right: 10px">
                            <input type="reset" class="btn btn-warning" value="Reset">
                   

                </form>
            </div>
            <div class="col-sm-3"></div>
                
        </div>
    </div>
	<div class="col-sm-12 text-center"><a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a></div>	
</div>
     
     
<?php include("partial/footer.php"); ?>     
     