<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
=========================================================
* PHP CODE AND MODIFICATION BY : NABIL 'ZTF ' E.A 
https://github.com/ZTF666
=========================================================

-->
<?php
include_once('../../backend/classes/DAO.php');

if(!empty($_SESSION['admin'])) {
$admin=unserialize($_SESSION['admin']);
}
else{
	header('location:../../frontend/pages/login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        BULLSHARK GYM - ADMIN PANEL
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

</head>

<body class="dark-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" >
            <div class="logo">
            <a href="#" class="simple-text logo-normal">BULLSHARK GYM</a>
         
                
                </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active ">
                        <a class="nav-link" href="./dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="./addmember.php">
                            <i class="material-icons">add_circle_outline</i>
                            <p>Add Members</p>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="./membersprofiles.php">
                            <i class="material-icons">person</i>
                            <p>Members Profiles</p>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="./inactivemembersprofiles.php">
                            <i class="material-icons">archive</i>
                            <p>Inactive Members</p>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="./memberslist.php">
                            <i class="material-icons">content_paste</i>
                            <p>Members List</p>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="../../backend/logic/logout.php">
                            <i class="material-icons">logout</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
        <div class="alert alert-success">
                    <span>Welcome , <?php  echo $admin->fullname;  ?> 💪</span>
                  </div>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
 

                    <div class="row">

                        <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_copy</i>
                                    </div>
                                    <p class="card-category">Used Space</p>
                                    <h3 class="card-title">49/50
                                        <small>GB</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-warning">warning</i>
                                        <a href="#pablo" class="warning-link">Get More Space...</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">attach_money</i>
                                    </div>
                                    <p class="card-category">Revenue</p>
                                    <?php 
                                    $dao = new DAO();
                                    $finalamount=0;
                                    $members = $dao->getRevenue();
                                    foreach($members as $count){

                                            $finalamount = $finalamount+((int)$count->amount);
                                    }
                                    ?>
                                    <h3 class="card-title"><?php echo $finalamount ?>Dhs</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">attach_money</i> Total earned
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">info_outline</i>
                                    </div>
                                    <p class="card-category">Fixed Issues</p>
                                    <h3 class="card-title">75</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Tracked from Github
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <p class="card-category">Members</p>
                                    <?php 
                                    $dao = new DAO();
                                    $finnalCount=0;
                                    $members = $dao->membersCount();
                                    foreach($members as $count){
                                            $finnalCount = $finnalCount+1;
                                    }
                                    ?>
                                    <h3 class="card-title"><?php echo $finnalCount ?></h3>
                                    
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">person</i> Number of Members
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <p class="card-category">Members</p>
                                    <?php 
                                    $dao = new DAO();
                                    $finnalCount=0;
                                    $members = $dao->InactivemembersCount();
                                    foreach($members as $count){
                                            $finnalCount = $finnalCount+1;
                                    }
                                    ?>
                                    <h3 class="card-title"><?php echo $finnalCount ?></h3>
                                    
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">person</i> Number of Inactive Members
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                 
                </div>
            </div>

        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>


    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>
</body>

</html>