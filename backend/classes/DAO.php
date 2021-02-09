<?php 

include('AdminClass.php');
include('MemberClass.php');
include('PaymentClass.php');
include('connexion.php');

class DAO {

// Consturctor
    function __construct(){
        connection::connect();
    }

    // Adding new member to database 
    function AddMember($cnie,$phone,$fname,$lname,$bdate,$jdate,$photo){
        
        $MyQuery="insert into members(cnie_member,phone,fname,lname,bdate,jdate,picture)
        values('".$cnie."','".$phone."','".$fname."','".$lname."','".$bdate."','".$jdate."','".$photo."')";
        connection::Maj($MyQuery);
    }

    // Adding payment for a member
    function AddPayment($cnie,$cnie_admin,$month,$amount,$notes){
       

        $MyQuery="insert into Payments(cnie_member,cnie_admin,month,amount,notes)values('".$cnie."','".$cnie_admin."','".$month."','".$amount."','".$notes."')";
        connection::Maj($MyQuery);

    }

    // Authentication
    function Login($login,$pwd){
       
        $admin=null;
        $ztf=connection::Select("select * from Admin where cnie_admin='".$login."' and pwd='".$pwd."'");
        if($data=$ztf->fetch()){
            $admin=new Admin();
            $admin->id_admin =$data['id_admin'];
            $admin->cnie_admin =$data['cnie_admin'];
            $admin->phone =$data['phone'];
            $admin->fullname =$data['fullname'];
            $admin->bdate =$data['bdate'];
            $admin->picture =$data['picture'];
        }
        return $admin;
    }

    // fetching all members
    function AllMembers(){
        
        $members=array();
        $ztf=connection::Select("select * from members ");
        foreach($ztf as $rec){
            $NMember=new Member();
            $NMember->id_member = $rec['id_member'];
            $NMember->cnie_member = $rec['cnie_member'];
            $NMember->phone = $rec['phone'];
            $NMember->fname = $rec['fname'];
            $NMember->lname = $rec['lname'];
            $NMember->bdate = $rec['bdate'];
            $NMember->jdate = $rec['jdate'];
            $NMember->picture = $rec['picture'];
            array_push($members,$NMember);
        }
        return $members;
    }
  

    // Get specific profile , given cnie unique key
    function getMember($cnie){

        $MemberData=array();
        $myQuery=connection::Select("select* from members where (cnie_member= '".$cnie."') ");
        foreach($myQuery as $data){
        $member=new Member();
        $member->id_member = $data['id_member'];
        $member->cnie_member = $data['cnie_member'];
        $member->phone = $data['phone'];
        $member->fname = $data['fname'];
        $member->lname = $data['lname'];
        $member->bdate = $data['bdate'];
        $member->jdate = $data['jdate'];
        $member->picture = $data['picture'];
        array_push($MemberData,$member);
        }
        return $MemberData;

    }


    function UpdateMemberData($old_cnie,$cnie,$phone,$fname,$lname,$bdate,$jdate,$picture){
        // if the image property hasn't been changed
        if(empty($picture) ){ 
            $myQuery="update members set cnie_member='".$cnie."',phone='".$phone."',fname='".$fname."',lname='".$lname."',bdate='".$bdate."',jdate='".$jdate."'  
            where cnie_member='".$old_cnie."'";
            connection::Maj($myQuery);
            // updating the member's payment cnie in the payments table  in case it was changed due to an error at creation
                if($old_cnie !=$cnie){
                    $myQuery = "update payments set cnie_member='".$cnie."' where cnie_member='".$old_cnie."'  ";
                    connection::Maj($myQuery);
                }

        } // if the image property has been changed
        else if(!empty($picture) ){  
            $myQuery="update members set cnie_member='".$cnie."',phone='".$phone."',fname='".$fname."',lname='".$lname."',bdate='".$bdate."',jdate='".$jdate."',picture='".$picture."'  
            where cnie_member='".$old_cnie."'";
            connection::Maj($myQuery);
            // updating the member's payment cnie in the payments table in case it was changed due to an error at creation
            if($old_cnie !=$cnie){
                $myQuery = "update payments set cnie_member='".$cnie."' where cnie_member='".$old_cnie."'  ";
                connection::Maj($myQuery);
            }
        }
    }



    // Get specific profile , given cnie unique key
    function getMemberPayment($cnie){

        $MemberData=array();
        $myQuery=connection::Select("select* from payments where (cnie_member= '".$cnie."') ");
        foreach($myQuery as $data){
        $member=new Member();

        $member->month = $data['month'];
        $member->amount = $data['amount'];
        $member->notes = $data['notes'];

        array_push($MemberData,$member);
        }
        return $MemberData;

    }
    // members count for the dashboard thingy
    // don't even bother question my decision to make this abomination , i'm too lazy to even optimize or think about a better way ...
    // if it works it ain't stupid xD
    function membersCount(){
        $count=array();
        $myQuery= connection::Select("SELECT cnie_member FROM members");
        foreach($myQuery as $data){
            $member=new Member();
            array_push($count,$member);
        }
        return $count;
    }
    // inactive members count
    function InactivemembersCount(){
        $count=array();
        $myQuery= connection::Select("SELECT cnie_member FROM inactive_members");
        foreach($myQuery as $data){
            $member=new Member();
            array_push($count,$member);
        }
        return $count;
    }
    // Total revenue from members that payed/gave advance payment

    function getRevenue(){
        $count=array();
        $myQuery= connection::Select("SELECT amount FROM payments");
        foreach($myQuery as $data){
            $payment=new Payment();
            $payment->amount=$data['amount'];
            array_push($count,$payment);
        }
        return $count;
    }

    // Archiving inactive members and moving them from members table to
    //  inactive_members table
    function ArchiveMember($cnie){
        // copying the members data from one to the other
        $MyQuery="INSERT into inactive_members (select * from members where cnie_member='".$cnie."')";
        connection::Maj($MyQuery);
        // deleting from the members table |this is a personal choice , it might be stupid but idc 
        $MyQueryDel="DELETE FROM members WHERE cnie_member='".$cnie."'";
        connection::Maj($MyQueryDel);
    }
    // Reversing the archiving function  above 
    // you just switch the tables names and that's it duuh :D
    function UnArchiveMember($cnie){
        // copying the members data from one to the other
        $MyQuery="INSERT into members (select * from inactive_members where cnie_member='".$cnie."')";
        connection::Maj($MyQuery);
        // deleting from the members table |this is a personal choice , it might be stupid but idc 
        $MyQueryDel="DELETE FROM inactive_members WHERE cnie_member='".$cnie."'";
        connection::Maj($MyQueryDel);
    }

  // fetching all inactive members
  function AllInactiveMembers(){
   
    $members=array();
    $ztf=connection::Select("select * from inactive_members ");
    foreach($ztf as $rec){
        $NMember = new Member();
        $NMember->id_member = $rec['id_member'];
        $NMember->cnie_member = $rec['cnie_member'];
        $NMember->phone = $rec['phone'];
        $NMember->fname = $rec['fname'];
        $NMember->lname = $rec['lname'];
        $NMember->bdate = $rec['bdate'];
        $NMember->jdate = $rec['jdate'];
        $NMember->picture = $rec['picture'];
        array_push($members,$NMember);
    }
    return $members;
}








}
?>