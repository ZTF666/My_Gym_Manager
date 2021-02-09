<?php 

include('../classes/DAO.php');
// new instance
$dao = new DAO();
// getting data from form
$cnie   = $_POST['cnie'];
$phone  = $_POST['phone'];
$fname  = $_POST['fname'];
$lname  = $_POST['lname'];
$bdate  = $_POST['bdate'];
$jdate  = $_POST['jdate'];
// Photo management
$imgdir = '../../assets/members/';
$photo = $_FILES['photo']['name'];
$upload = $imgdir.basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
// pushing data to db
$dao->AddMember($cnie,$phone,$fname,$lname,$bdate,$jdate,$photo);
// Redirecting
header('location:../../frontend/pages/membersprofiles.php');

?>