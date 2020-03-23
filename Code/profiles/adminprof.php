<?php include('../server.php');?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Profile Page</title>
<link rel="stylesheet" type="text/css" href="../logins/styles.css">
<link rel="stylesheet" type="text/css" href="../navigation.css">
<style>

body {
	margin: auto;
	padding: 80px;
	font-family: sans-serif;
	text-align: center;
	background: #000000;
}
fieldset {
	color: #fff;	
}
form {
	color: #fff;
}
ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: #fb2525;
}

li {
	float: right;
}

li a {
	display: block;
	padding: 12px;
}

img {
  border-radius: 50%;
}
</style>
</head>

<body>
	<ul>
        <div class="dropdown">
            <button class="dropbtn"><a href="adminprof.html"><img src="admin.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="admin_home.html">HOME</a>
                <a href="#">ADMIN</a>
                <a href="#">SPONSOR</a>
                <a href="#">DRIVER</a>
                <a href="#">ANALYTIC</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
    
    </ul>

<p>
	<img src="admin.jpg" alt="Avatar" width="200" height="200" align="middle">
	<form>
  		<input type="radio" name="type" value="admin" checked> Administrator  
	</form>
<p>

<form action="adminprof.php" method="post">
<?php include('../errors.php');?> 
    <fieldset>
    	<legend><b>General Info</b></legend>
    	<p>
          	<input type = "text"
               	name = "firstname"
               	placeholder = "First name" value="<?php echo $_SESSION['fnameA']; ?>"/>
            <input type = "text"
                name = "middlename"
                placeholder = "Middle name" value="<?php echo $_SESSION['mnameA']; ?>"/>
            <input type = "text"
                name = "lastname"
                placeholder = "Last name" value="<?php echo $_SESSION['lnameA']; ?>"/><br><br>
            <select id="Month">
              <option value="Month">Month</option>
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
            <select id="Day">
              <option value="Day">Day</option>
              <option value="one">1</option>
              <option value="Two">2</option>
              <option value="threey">3</option>
              <option value="Four">4</option>
              <option value="Five">5</option>
              <option value="six">6</option>
              <option value="seven">7</option>
              <option value="nine">8</option>
              <option value="10">9</option>
              <option value="11">10</option>
              <option value="12">11</option>
              <option value="13">12</option>
              <option value="one">13</option>
              <option value="Two">14</option>
              <option value="threey">15</option>
              <option value="Four">16</option>
              <option value="Five">17</option>
              <option value="six">18</option>
              <option value="seven">19</option>
              <option value="nine">20</option>
              <option value="10">21</option>
              <option value="11">22</option>
              <option value="12">23</option>
              <option value="13">24</option>
              <option value="one">25</option>
              <option value="Two">26</option>
              <option value="threey">27</option>
              <option value="Four">28</option>
              <option value="Five">29</option>
              <option value="six">30</option>
              <option value="seven">31</option>
            </select>
            <input type = "text"
                name = "year"
                placeholder = "Year" value="<?php echo $_SESSION['byearA']; ?>"/><br><br>
            <input type = "text"
                name = "deparment"
                placeholder = "Department" value="<?php echo $_SESSION['departmentA']; ?>"/><br><br>
        </p>
    </fieldset>
    <button type="submit" name = "submitAdmin">Update</button>
</form>

</body>
</html>
