<?php include('../server.php');?>

<html>
<head>
<title>Profile Page</title>
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
            <button class="dropbtn"><a href="driverprof.php"><img src="profpic.png" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="driver_home.html">HOME</a>
                <a href="../catalog/catalog_home.php">CATALOG</a>
                <a href="points.php">POINTS</a>
                <a href="#">PURCHASES</a>
                <a href="driver_company.php">COMPANY</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
     </div>

	 <button class="dropbtn2"><li><a href="../catalog/shoppingCart.html"><img src="../catalog/cart.png" alt="Cart" width="50" height="50"  style="float: right;"></a></li></button>

</ul>

<p>
	<img src="profpic.png" alt="Avatar" width="200" height="200" align="middle">
	<form>
  		<input type="radio" name="type" value="driver" checked> Driver<br> 
	</form>
<p>

<form action="driverprof.php" method="post">
<?php include('../errors.php');?>  
  <fieldset>
    	<legend><b>Personal Info</b></legend>
    	<p>
          	<input type = "text"
               	name = "firstname"
               	placeholder = "First name" value="<?php echo $_SESSION['fname']; ?>"/>
            <input type = "text"
               	name = "middlename"
               	placeholder = "Middle name" value="<?php echo $_SESSION['mname']; ?>"/>
            <input type = "text"
               	name = "lastname"
               	placeholder = "Last name" value="<?php echo $_SESSION['lname']; ?>"/><br><br>
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
                placeholder = "Year" value="<?php echo $_SESSION['byear']; ?>"/><br><br>
        </p>
    </fieldset>
    <fieldset>
    	<legend><b>Contact Info</b></legend>
    	<p>
    		<input type = "text"
               	name = "phonenumber"
               	placeholder = "Cell phone number" value="<?php echo $_SESSION['phone']; ?>"/>
            <input type = "text"
               	name = "email"
               	placeholder = "Email" value="<?php echo $_SESSION['email']; ?>"/>
            <ins><br><br>Mailing Address</ins>
            <p>
            	<input type = "text"
               		name = "streetaddress"
               		placeholder = "Street address" value="<?php echo $_SESSION['street']; ?>"/>
            	<input type = "text"
               		name = "city"
               		placeholder = "City" value="<?php echo $_SESSION['city']; ?>"/>
              <select id="state">
		      			<option value="Sel">Select</option>
  					<option value="AL">Alabama - AL</option>
  					<option value="AK">Alaska - AK</option>
  					<option value="AZ">Arizona - AZ</option>
  					<option value="AR">Arkansas - AR</option>
  					<option value="CA">California - CA</option>
  					<option value="CO">Colorado - CO</option>
  					<option value="CT">Connecticut - CT</option>
  					<option value="DE">Delaware - DE</option>
  					<option value="FL">Florida - FL</option>
  					<option value="GA">Georgia - GA</option>
  					<option value="HI">Hawaii - HI</option>
  					<option value="ID">Idaho - ID</option>
  					<option value="IL">Illinois - IL</option>
  					<option value="IN">Indiana - IN</option>
  					<option value="IA">Iowa - IA</option>
  					<option value="KS">Kansas - KS</option>
  					<option value="KY">Kentucky - KY</option>
  					<option value="LA">Louisiana - LA</option>
  					<option value="ME">Maine - ME</option>
  					<option value="MD">Maryland - MD</option>
  					<option value="MA">Massachusetts - MA</option>
  					<option value="MI">Michigan - MI</option>
  					<option value="MN">Minnesota - MN</option>
  					<option value="MS">Mississippi - MS</option>
  					<option value="MO">Missouri - MO</option>
  					<option value="MT">Montana - MT</option>
  					<option value="NE">Nebraska - NE</option>
  					<option value="NV">Nevada - NV</option>
  					<option value="NH">New Hampshire - NH</option>
  					<option value="NJ">New Jersey - NJ</option>
  					<option value="NM">New Mexico - NM</option>
  					<option value="NY">New York - NY</option>
  					<option value="NC">North Carolina - NC</option>
  					<option value="ND">North Dakota - ND</option>
  					<option value="OH">Ohio - OH</option>
  					<option value="OK">Oklahoma - OK</option>
  					<option value="OR">Oregon - OR</option>
  					<option value="PA">Pennsylvania - PA</option>
  					<option value="RI">Rhode Island - RI</option>
  					<option value="SC">South Carolina - SC</option>
  					<option value="SD">South Dakota - SD</option>
  					<option value="TN">Tennessee - TN</option>
  					<option value="TX">Texas - TX</option>
  					<option value="UT">Utah - UT</option>
  					<option value="VT">Vermont - VT</option>
  					<option value="VA">Virginia - VA</option>
  					<option value="WA">Washington - WA</option>
  					<option value="WV">West Virginia - WV</option>
  					<option value="WI">Wisconsin - WI</option>
  					<option value="WY">Wyoming - WY</option>
				</select>
                <input type = "text"
               		id = "zipcode"
               		placeholder = "Zip code" value="<?php echo $_SESSION['zipcode']; ?>"/>
            </p>
        </p>
    </fieldset>
	<button type="submit" name = "submit">Update</button>
</form>

</body>
</html>
