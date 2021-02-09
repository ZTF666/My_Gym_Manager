<?php 

include('../classes/DAO.php');
// new instance
$dao = new DAO();
// getting data from form
$cnie   = $_POST['cnie_hidden'];

if($cnie != null){
$_SESSION['cnie_hidden_edit']= serialize($cnie);
               
header('location:../../frontend/pages/editmember.php');
}else{
header('location:../../frontend/pages/membersprofiles.php');
}

?>