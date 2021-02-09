<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================
=========================================================
* PHP CODE AND MODIFICATION BY : NABIL 'ZTF ' E.A 
https://github.com/ZTF666
=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
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
        Members Profiles
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
            <div class="logo"><a href="#" class="simple-text logo-normal">
                    BULLSHARK GYM
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item  ">
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
                    <li class="nav-item  active">
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

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                    <?php 
                        $dao = new DAO();
                        $Members = $dao->AllMembers();

                        // iterating through all the members
                        foreach($Members as $Member)
                        {
                    ?>

                        <!-- profile card -->
                        <div class="col-md-4" >
              <div class="card card-profile ztf">
                <div class="card-avatar">
                  <a href="#">
                    <img class="img" src="../../assets/members/<?php echo $Member->picture;?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category"><?php echo $Member->fname; echo " " ; echo $Member->lname; ?></h6>
                  <h4 class="card-title"><?php echo $Member->jdate;?></h4>
                  <h4 class="card-title"><?php echo $Member->phone;?></h4>
                  <form action="../../backend/logic/makePaymentMediator.php" method="POST">
                  <input type="text" name="cnie_hidden" value="<?php echo $Member->cnie_member;?>" hidden>
                  <button type="submit"  class="btn btn-primary btn-round">Add Payment</button>
                  </form>
                  <form action="../../backend/logic/editProfileMediator.php" method="POST">
                  <input type="text" name="cnie_hidden" value="<?php echo $Member->cnie_member;?>" hidden>
                  <button type="submit" name="edit" class="btn btn-success btn-round">Edit Profile</button>
                  </form>
                  <form action="../../backend/logic/archiveProfileHandler.php" method="POST">
                  <input type="text" name="cnie_hidden" value="<?php echo $Member->cnie_member;?>" hidden>
                  <button type="submit"  class="btn btn-danger btn-round">Archive</button>
                  </form>
                </div>
              </div>
            </div>
            <?php 
                        }
            ?>
                        <!-- end profile card -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--   Core JS Files   -->
    <!-- <script src="../assets/js/core/jquery.min.js"></script> -->
    <!-- <script src="../assets/js/core/popper.min.js"></script> -->
    <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

<style>
    .ztf{
        min-height: 270px;
    }
</style>


</body>

</html>