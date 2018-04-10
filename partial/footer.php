<!-- footer -->
<footer class="foot">
<!--    <div class="col-sm-12"><a href="#top"><button class="btn btn-default pull-right">Top</button></a></div>-->
        <div class="col-sm-4">
            <i class="fa fa-mobile" aria-hidden="true"></i>
            
            <div class="phoneNum">+1-647-000-1111</div>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <div class="phoneNum">gallery@gallery.com</div>
        </div>
        <div class="col-sm-4">
            <i class="fa fa-home" aria-hidden="true"></i>
            <div class="phoneNum">Street Ave. TO. ON. M4D 6L5</div>
        </div>
    <div class="col-sm-12"><p>&copy; 2016 Picasso</p></div>    

	
</footer>
<a id="back-to-top" href="#" class="btn btn-default btn-lg back-to-top" role="button" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

<!-- external scripts     -->
<script src="jquery/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>

<script type="text/javascript">

<?php if(isset($_POST['btnLogin'])) { ?> 

            $(function() {                       
                $('#mylogin').modal('show');     
            });

<?php } ?>    
<?php if(isset($_POST['btnSubmit'])) { ?> 

            $(function() {                       
                $('#myregister').modal('show');     
            });

<?php } ?>

                                                              
        </script>


</body>
</html>

