<?php 

        require_once("connect.php");

        if(isset($_GET['Del']))
        {
            $UserID = $_GET['Del'];
            $query = " delete from users where id = '".$UserID."'";
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
?>
<!--
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../navigation.css">
	<link rel="stylesheet" type="text/css" href="delete.css">

    <title>Review/Edit Administrators</title>
</head>
	<button onclick="document.getElementById('id01').style.display='block'">Delete</button>
<body >
		<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form method="post" class="modal-content" action="delete.php">">
    <div class="container">
      <h1 style="color: black">Delete Account</h1>
      <p style="color: black">Are you sure you want to delete this account?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn" name="Del">Delete</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
-->