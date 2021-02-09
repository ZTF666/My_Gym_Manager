<?php 

include('../classes/DAO.php');
// new instance
$dao = new DAO();
// getting data from form
$old_cnie= $_POST['old_cnie'];
$cnie   = $_POST['cnie'];
$phone  = $_POST['phone'];
$fname  = $_POST['fname'];
$lname  = $_POST['lname'];
$bdate  = $_POST['bdate'];
$jdate  = $_POST['jdate'];
// Photo management
$imgdir = '../../assets/members/';
$picture = $_FILES['photo']['name'];
$upload = $imgdir.basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'],$upload);


$dao->UpdateMemberData($old_cnie,$cnie,$phone,$fname,$lname,$bdate,$jdate,$picture);

// Redirecting
header('location:../../frontend/pages/membersprofiles.php');


?>