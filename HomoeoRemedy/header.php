
 <header class="main-header navbar-fixed-top">

    <!-- Logo -->
    <a href="index.php" class="logo">
    
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Homoeo</b>Remedy</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
   
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="med_shop.php">
              <i class="fa fa-shopping-cart"></i>
              Shop
            </a>
            
          </li>

        
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="med_review.php" >
              <i class="fa fa-flag-o"></i>
              
              Remedy Review
            </a>
            
          </li>
          <!-- User Account Menu -->
           <?php if(isset($_SESSION["username"])){ ?>

          
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           
              <?php echo "Welcome ". $_SESSION["username"]; ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="sign_out.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li> <?php
                } 
                else{ ?>
                <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="login.php">
              <i class="fa  fa-user-plus"></i>
             Log In
            </a>
          </li> 
          <?php } ?>
          
        </ul>
      </div>
    </nav>
  </header>