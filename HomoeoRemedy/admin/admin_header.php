
<header class="main-header navbar-fixed-top">

    <!-- Logo -->
    <a href="index.php" class="logo">
        <span class="logo-lg"><b>Homoeo</b>Medicine</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        Home
                    </a>

                </li>
                <li class="dropdown notifications-menu">
                    <a href="customer.php">
                        <i class="fa fa-hand-paper-o"></i>
                        All Users
                    </a>

                </li>
                <li class="dropdown messages-menu">
                    <a href="add_remedy.php">
                        <i class="fa fa-hand-paper-o"></i>
                        Add New Medicine
                    </a>

                </li>

                <li class="dropdown notifications-menu">
                    <a href="total_sale.php">
                        <i class="fa fa-hand-paper-o"></i>
                        Total Sale
                    </a>

                </li>

                <!-- User Account Menu -->
                <?php if(isset($_SESSION["admin"])){ ?>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <?php echo "Welcome ". $_SESSION["admin"]; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                    <a href="../sign_out.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </nav>
</header>