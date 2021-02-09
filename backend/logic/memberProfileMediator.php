<?php 

include('../classes/DAO.php');
// new instance
$dao = new DAO();
// getting data from form
$cnie = $_POST['cnie_hidden'];

// var_dump($cnie);
// echo $cnie;

if($cnie != null){
$_SESSION['cnie_hidden_view']= serialize($cnie);
               
header('location:../../frontend/pages/MemberProfile.php');
}else{
header('location:../../frontend/pages/memberslist.php');
}

?>