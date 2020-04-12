<?php 
 
    require_once("connect.php");
 
    if(isset($_POST['updateAD']))
    {
        $UserID = $_GET['ID'];
        $UserName = $_POST['username'];
        $UserEmail = $_POST['email'];
        $UserPass = $_POST['password'];
        $UserFname = $_POST['fname'];
        $UserMname = $_POST['mname'];
        $UserLname = $_POST['lname'];
        $UserPoints = $_POST['points'];
        $UserBmonth = $_POST['bmonth'];
        $UserBday = $_POST['bday'];
        $UserCity = $_POST['city'];
        $UserState = $_POST['state'];
 
        $query = " update users set username = '".$UserName."', email='".$UserEmail."', password='".$UserPass."', fname='".$UserFname."', mname='".$UserMname."', lname='".$UserLname."', points='".$UserPoints."', bmonth='".$UserBmonth."', bday='".$UserBday."', city='".$UserCity."', state='".$UserState."' where id='".$UserID."'";
        $result = mysqli_query($conn,$query);
 		$user = mysqli_fetch_assoc($results);

      if (mysqli_num_rows($results) == 1) {
        
			header("location:adminDriver_view.php");
        }
        else
        {
			header("location:../logins/signup.php");
            //echo ' Please Check Your Query ';
        }
    }
    /*else
    {
			header("location:adminDriver_view.php");
    }*/

  /*if(isset($_POST['updateSD']))
    {
        $UserID = $_GET['ID'];
        $UserName = $_POST['username'];
        $UserEmail = $_POST['email'];
        $UserPass = $_POST['password'];
        $UserFname = $_POST['fname'];
        $UserMname = $_POST['mname'];
        $UserLname = $_POST['lname'];
        $UserPoints = $_POST['points'];
        $UserBmonth = $_POST['bmonth'];
        $UserBday = $_POST['bday'];
        $UserCity = $_POST['city'];
        $UserState = $_POST['state'];
 
        $query = " update users set username = '".$UserName."', email='".$UserEmail."', password='".$UserPass."', fname='".$UserFname."', mname='".$UserMname."', lname='".$UserLname."', points='".$UserPoints."', bmonth='".$UserBmonth."', bday='".$UserBday."', city='".$UserCity."', state='".$UserState."' where id='".$UserID."'";
        $result = mysqli_query($conn,$query);
 
        if($result)
        {
			header("location:sponsorDriver_view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    /*else
    {
			header("location:sponsorDriver_view.php");
    }*/
/*
 if(isset($_POST['updateAS']))
    {
        $UserID = $_GET['ID'];
        $UserName = $_POST['username'];
        $UserEmail = $_POST['email'];
        $UserPass = $_POST['password'];
        $UserFname = $_POST['fname'];
        $UserMname = $_POST['mname'];
        $UserLname = $_POST['lname'];
        $UserBmonth = $_POST['bmonth'];
        $UserBday = $_POST['bday'];
        $UserCity = $_POST['city'];
        $UserState = $_POST['state'];
 
        $query = " update users set username = '".$UserName."', email='".$UserEmail."', password='".$UserPass."', fname='".$UserFname."', mname='".$UserMname."', lname='".$UserLname."', bmonth='".$UserBmonth."', bday='".$UserBday."', city='".$UserCity."', state='".$UserState."' where id='".$UserID."'";
        $result = mysqli_query($conn,$query);
 
        if($result)
        {
           header("location:adminSponsor_view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:adminSponsor_view.php");
    }

 if(isset($_POST['updateA']))
    {
        $UserID = $_GET['ID'];
        $UserName = $_POST['username'];
        $UserEmail = $_POST['email'];
        $UserPass = $_POST['password'];
        $UserFname = $_POST['fname'];
        $UserMname = $_POST['mname'];
        $UserLname = $_POST['lname'];
        $UserBmonth = $_POST['bmonth'];
        $UserBday = $_POST['bday'];
        $UserCity = $_POST['city'];
        $UserState = $_POST['state'];
 
        $query = " update users set username = '".$UserName."', email='".$UserEmail."', password='".$UserPass."', fname='".$UserFname."', mname='".$UserMname."', lname='".$UserLname."', bmonth='".$UserBmonth."', bday='".$UserBday."', city='".$UserCity."', state='".$UserState."' where id='".$UserID."'";
        $result = mysqli_query($conn,$query);
 
        if($result)
        {
           header("location:admin_view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:admin_view.php");
    }
 */
?>