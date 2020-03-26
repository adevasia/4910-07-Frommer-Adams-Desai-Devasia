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
    
    
    
    <TABLE>
   <TR>
      <TD>Behavior 1: <?php echo $row1['tenpoints']; ?></TD>
   </TR>
   <TR>
      <TD>Behavior 2: <?php echo $row1['twentypoints']; ?></TD>
   </TR>
   <TR>
      <TD>Behavior 3: <?php echo $row1['thirtypoints']; ?></TD>
   </TR>
   <TR>
      <TD>Behavior 4: <?php echo $row1['fortypoints']; ?></TD>
   </TR>
</TABLE>

 
</head> 
  
</html> 
