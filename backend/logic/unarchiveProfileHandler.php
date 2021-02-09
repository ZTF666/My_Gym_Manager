<?php 

include('../classes/DAO.php');
// new instance
$dao = new DAO();
// getting data from form
$cnie   = $_POST['cnie_hidden'];
$dao->UnArchiveMember($cnie);

header('location:../../frontend/pages/membersprofiles.php');


?>