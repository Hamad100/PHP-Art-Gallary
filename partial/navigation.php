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
        <li class="dropdown"><?php echo "<a href=\"home.php#top\">Home</a>"; ?></li>
        <li class="dropdown"><?php echo "<a href=\"home.php#about\">About</a>" ?></li>
        <li class="dropdown"><?php echo "<a href=\"home.php#category\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" data-hover=\"dropdown\" data-delay=\"1000\" data-close-others=\"false\">Categories <b class=\"caret\"></b></a>" ?>
                <ul class="dropdown-menu">
                    <li><?php echo "<a style=\"color: #000\" tabindex=\"-1\" href=\"category.php?cat=1\">PAINTING</a>"; ?></li>
                    <li class="divider"></li>
                    <li><?php echo "<a style=\"color: #000\" tabindex=\"-1\" href=\"category.php?cat=2\">SCULPTURE</a>"; ?></li>
                    <li class="divider"></li>
                    <li><?php echo "<a style=\"color: #000\" tabindex=\"-1\"  href=\"category.php?cat=3\">PHOTOGRAPHY</a>"; ?></li>
                </ul>
        </li>
        <li class="dropdown"><?php echo "<a href=\"contact.php\">Contact</a>" ?></li>  
        <li class="dropdown"><?php echo "<a href=\"\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" data-hover=\"dropdown\" data-delay=\"1000\" data-close-others=\"false\">{$_SESSION['username']} <b class=\"caret\"></b></a>" ?>
            <ul class="dropdown-menu">
                    <li><?php echo "<a style=\"color: #000\" tabindex=\"-1\" href=\"index.php?action=logout\">Logout</a>"; ?></li>
                    <li class="divider"></li>
                    <li><?php echo "<a style=\"color: #000\" tabindex=\"-1\" href=\"changeprofile.php\">Profile</a>"; ?></li>
            </ul>
          
          </li>
        
        <li class="dropdown cart"><?php echo "<a href=\"cart.php\"><i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i></a>" ?></li> 
      </ul>
    </div>
  </div>
</nav>

<!-- add the modal login and register here-->
<?php include("login.php"); ?>
<?php include("register.php"); ?>