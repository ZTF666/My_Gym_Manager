<?php
include('../classes/DAO.php');
//new instance
$dao = new DAO();
// getting data from form
$login = $_POST['log'];
$pwd = $_POST['password'];



$admin = $dao->Login($login,$pwd);

if($admin != null)
                {
                $_SESSION['admin']= serialize($admin);
                header('location:../../frontend/pages/dashboard.php');
  
                }

else
                {
                echo"<script language=\"javascript\">";
    echo "alert('Login or password inccorect!!')";
    echo"</script>";
    
    header('location:../../frontend/pages/login.php');
                }


?>