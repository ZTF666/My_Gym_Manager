<?php 

// add cnie of logged in admin when times comes

include('../classes/DAO.php');
// new instance
$dao = new DAO();
// getting data from form
$cnie   = $_POST['cnie_member'];
$cnie_admin = $_POST['cnie_admin'];
$month   = $_POST['month'];
$amount   = $_POST['amount'];
$notes   = $_POST['notes'];


$dao->AddPayment($cnie,$cnie_admin,$month,$amount,$notes);


               
header('location:../../frontend/pages/membersprofiles.php');


?>