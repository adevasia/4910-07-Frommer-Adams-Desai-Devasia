<?php include('../server.php');?>

<html> 
      
<head> 
    <title> 
        What good behavior have you displayed today? 
    </title> 
</head> 
  
<body style="text-align:center;"> 
      
    <h1 style="color:green;"> 
        Reward System 
    </h1> 
      
    <h4> 
        What good behavior have you displayed today? 
    </h4> 
  
      
    <form method="post" action="points.php"> 
    
        <input type="submit" name="button1"
                value="Behavior 1"/> 
          
        <input type="submit" name="button2"
                value="Behavior 2"/> 
                
        <input type="submit" name="button2"
                value="Behavior 3"/>
                
        <input type="submit" name="button2"
                value="Behavior 4"/>
    </form>
    
    
<?php 
  mysqli_select_db($db, 'cloud337');
$ten = "SELECT tenpoints FROM company WHERE id=123";
$result_ten = mysqli_query($db, $ten);

if(mysqli_num_rows($result_ten) > 0){

    $user = mysqli_fetch_assoc($result_ten);
    $user_ten = $user['tenpoints'];
   echo "Behavior 1: $user_ten,\n";
}
$twen = "SELECT twentypoints FROM company WHERE id=123";
$result_twen = mysqli_query($db, $twen);

if(mysqli_num_rows($result_twen) > 0){

    $user = mysqli_fetch_assoc($result_twen);
    $user_twen = $user['twentypoints'];
   echo "Behavior 2: $user_twen,\n";
}
$ten = "SELECT thirtypoints FROM company WHERE id=123";
$result_ten = mysqli_query($db, $ten);

if(mysqli_num_rows($result_ten) > 0){

    $user = mysqli_fetch_assoc($result_ten);
    $user_ten = $user['thirtypoints'];
    echo "Behavior 3: $user_ten, \n";
}
$ten = "SELECT fortypoints FROM company WHERE id=123";
$result_ten = mysqli_query($db, $ten);

if(mysqli_num_rows($result_ten) > 0){

    $user = mysqli_fetch_assoc($result_ten);
    $user_ten = $user['fortypoints'];
   echo "Behavior 4: $user_ten";
}
?>
 
</head> 
  
</html> 
