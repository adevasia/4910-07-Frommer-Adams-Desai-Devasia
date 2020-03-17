<?php include('server.php')?>

<html>
<head>
<title>Profile Page</title>
<link rel="stylesheet" type="text/css" href="styles.css">
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
    <li><a href="login.html">Logout</a></li>
    <li><a href="#profile">Profile</a></li>
</ul>

<p>
    <img src="image" alt="Avatar" width="200" height="200" align="middle">
    <form>
        <input type="radio" name="role" value="driver" checked> Driver<br>
        <input type="radio" name="role" value="sponsor"> Sponsor<br>
        <input type="radio" name="role" value="admin"> Administrator  
    </form>
<p>

<form action="profile.php" method="post">
    <fieldset>
        <legend><b>Personal Info</b></legend>
	<p>
	    <?php include('errors.php');?>
	    <input type="text" id="fname" placeholder="First name" value=<?php echo $_SESSION['fname']; ?> /> 
	    <input type="text" id="mname" placeholder="Middle name" value=<?php echo $_SESSION['mname']; ?> />
	    <input type="text" id="lname" placeholder="Last name" value=<?php echo $_SESSION['lname']; ?> />
	    <br><br>
	    <select id="bmonth">
		<option value="Month">Month</option>
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
	    </select>
	    <select id="bday">
		<option value="Day">Day</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	    </select>
	    <input type="text" id="byear" placeholder="Year"/>
	    <br><br> 
        </p>
    </fieldset>
    <fieldset>
        <legend><b>Contact Info</b></legend>
        <p>
            <input type="text" id="number" placeholder="Cell phone number" />
	    <input type="text" id="email" placeholder="Email" value=<?php echo $_SESSION['email']; ?>/>
            <ins><br><br>Mailing Address</ins>
            <p>
                <input type="text" id="street" placeholder="Street address" />
                <input type="text" id="city" placeholder="City" />
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
                <input type="text" id="zip" placeholder="Zip code" />
	    </p>
	</p>
    </fieldset>
    <br><br>
    <button type="submit" name="prof_info">Update</button>
</form>

</body>
</html>
