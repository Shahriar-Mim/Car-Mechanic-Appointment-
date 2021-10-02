<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<?php


if(!isset($_SESSION['USER_ID']))
{
    header("location: login.php");
}
else
{
}

?>
<?php
$profile =user_dtls();

?>

<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="dashboard.php">
                  <!-- <b class="logo-icon">
                     
                        <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                       
                        <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    -->
                    <!--End Logo icon -->
                    <!-- Logo text -->
                  <span class="logo-text">
                      <h3> Welcome</h3>
                                                           </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
               data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">

            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">

            </ul>
            <ul class="navbar-nav float-right">



                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">

                </li>


                <?php

                while ($row =mysqli_fetch_assoc($profile))
                {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">

                        <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                    class="text-dark">
                                <?php echo $row['user_name']?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="logout.php">
                            <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                            Logout
                        </a>
                    </div>
                </li>
                    <?php

                }

                ?>

            </ul>
        </div>
    </nav>
</header>



<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->

