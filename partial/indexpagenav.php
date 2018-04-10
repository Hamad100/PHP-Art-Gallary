<!--    navigation bar-->
<nav class="navbar navbar-custom navbar-transparent navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>        
      </button>
      <a class="navbar-brand" href="#" style="color: orangered">Picasso</a>
    </div>
    <div class="navbar-collapse collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><?php echo "<a href=\"index.php#top\">Home</a>"; ?></li>
        <li class="dropdown"><?php echo "<a href=\"index.php#about\">About</a>"; ?></li>
        <li class="dropdown"><?php echo "<a href=\"index.php#category\">Categories</a>"; ?></li>  
        <li class="dropdown cart"><?php echo "<a href=\"\" data-target=\"#mylogin\" data-toggle=\"modal\">Login</a>"; ?></li>
      </ul>
    </div>
  </div>
</nav>

<?php include("login.php"); ?>
<?php include("register.php"); ?>

