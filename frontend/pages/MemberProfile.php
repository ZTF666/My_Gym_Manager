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
// admin session
if(!empty($_SESSION['admin'])) {
$admin=unserialize($_SESSION['admin']);
}
else{
	header('location:../../frontend/pages/login.php');
	}
// member cnie session

if(!empty($_SESSION['cnie_hidden_view'])){
    $cnie_hidden=unserialize($_SESSION['cnie_hidden_view']);
    unset($_SESSION["cnie_hidden_view"]);
}else{
    header('location:../../frontend/pages/memberslist.php');
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
        Member Profile
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link href="../assets/css/ztf.css" rel="stylesheet" />

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

        <div class="content">
        <div class="container-fluid">
          <div class="row">
        <div class="col-md-10">
            <?php
            $dao = new DAO();
            $Member = $dao->getMember($cnie_hidden);
            
            foreach($Member as $MemberData){

            ?>
              <div class="card">
                <!-- <div class="card-header card-header-primary"> -->
                  <div class=" card-profile">
                            <div class="card-avatar">
                            <a href="#pablo">
                            <img class="img" src="../../assets/members/<?php echo $MemberData->picture;?>" />
                            </a>
                            </div>
                        </div>
                <!-- </div> -->
                <div class="card-body">
                  <form>
                <div class="row">
                     
                   <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">C.N.I.E</label>
                                                    <input type="text" class="form-control" name="cnie" value="<?php echo $MemberData->cnie_member ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="<?php echo $MemberData->phone ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Fist Name</label>
                                                    <input type="text" class="form-control" name="fname" value="<?php echo $MemberData->fname ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Last Name</label>
                                                    <input type="text" class="form-control" name="lname" value="<?php echo $MemberData->lname ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Birthdate</label>
                                                    <input type="text" class="form-control" name="bdate" placeholder="YYYY-MM-DD" value="<?php echo $MemberData->bdate ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Joining date</label>
                                                    <input type="text" class="form-control" name="jdate" placeholder="YYYY-MM-DD" value="<?php echo $MemberData->jdate ?>" disabled>
                                                </div>
                                            </div></div>
                                            
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- second card -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php
                            $dao = new DAO();
                            $Member = $dao->getMemberPayment($cnie_hidden);
                    
                            foreach($Member as $MemberData){

                        ?>
                        <div class="col-md-2">
                        <div class="row">
                    
                            <button type="button" class="btn btn-rose center">
                             <?php echo $MemberData->month; echo "  |  "; echo $MemberData->amount; echo "Dhs";?>
                            </button>
                   
                        </div>
                        <div class="clearfix"></div>
                        </div>
                        <?php } ?>
                    </div>
             
          </div>
        </div>
      </div>
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