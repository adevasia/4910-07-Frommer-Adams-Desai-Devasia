<?php include('../server.php');?>

<!DOCTYPE html>
<html>
<head>
<title>Sponsor's Profile Page</title>
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
  /*float: right;*/
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
            <button class="dropbtn"><a href="sponsor.html"><img src="spons.jpg" alt="Avatar" width="50" height="50" >
            </a></button>
            <div class="dropdown-content">
                <a href="sponsor_home.html">HOME</a>
                <a href="#">DRIVER</a>
                <a href="#">POINT SYSTEM</a>
                <a href="#">CATALOG</a>
                <a href="#">ANALYTIC</a>
                <a href="../logins/login.php">LOGOUT</a>
            </div>
        </div>
    
    </ul>

<p>
	<img src="profpic.png" alt="Avatar" width="200" height="200" align="middle">
	<form>
  		<input type="radio" name="type" value="sponsor"> Sponsor<br> 
	</form>
<p>

<form action="sponsorprof.php" method="post">
<?php include('../logins/errors.php');?> 
    <fieldset>
    	<legend><b>Personal Info</b></legend>
    	<p>
            <input type = "text"
                name = "firstname"
                placeholder = "First name" value="<?php echo $_SESSION['fnameS']; ?>"/>
            <input type = "text"
                name = "middlename"
                placeholder = "Middle name" value="<?php echo $_SESSION['mnameS']; ?>"/>
            <input type = "text"
                name = "lastname"
                placeholder = "Last name" value="<?php echo $_SESSION['lnameS']; ?>"/>
        </p>
    </fieldset>
    <fieldset>
    	<legend><b>Contact Info</b></legend>
    	<p>
    		<input type = "text"
               	name = "phonenumber"
               	placeholder = "Cell phone number" value="<?php echo $_SESSION['phoneS']; ?>"/>
            <!-- <br><small>Cell phone number</small><br><br> -->
            <input type = "text"
               	name = "email"
               	placeholder = "Email" value="<?php echo $_SESSION['emailS']; ?>"/>
            <!-- <br><small>Email</small><br><br> -->
            <ins><br><br>Mailing Address</ins>
            <p>
            	<input type = "text"
               		name = "streetaddress"
               		placeholder = "Street address" value="<?php echo $_SESSION['streetS']; ?>"/>
            	<!-- <br><small>Street Address</small><br><br> -->
            	<input type = "text"
               		name = "city"
               		placeholder = "City" value="<?php echo $_SESSION['cityS']; ?>"/>
              <select id="state">
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
               		name = "zipcode"
               		placeholder = "Zip code" value="<?php echo $_SESSION['zipcodeS']; ?>"/>
            </p>
        </p>
    </fieldset>
    <button type="submit" name = "submitSpons">Update</button>
</form>

</body>
</html>
