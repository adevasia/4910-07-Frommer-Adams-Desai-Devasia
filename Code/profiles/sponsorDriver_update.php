<?php 
 
    require_once("connect.php");
 

  if(isset($_POST['updateSD']))
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
    else
    {
			header("location:sponsorDriver_view.php");
    }
?>