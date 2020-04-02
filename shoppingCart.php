<?php include('../server.php');?>
<?php include 'finding_catalog.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="../navigation.css">
    <link rel="stylesheet" type="text/css" href="shoppingCart.css">
</head>

<body class="style">
    <ul>
        <h2 class="pointer">POINTS: </h2>

        <div class="dropdown">
          <button class="dropbtn"><a href="../profiles/driverprof.html"><img src="../profiles/profpic.png" alt="Avatar" width="50" height="50" >
          </a></button>
          <div class="dropdown-content">
            <a href="catalog_home.php">CATALOG</a>
            <a href="#">SPONSORS</a>
            <a href="../logins/login.php">LOGOUT</a>
          </div>
        </div>

        <button class="dropbtn2"><li><a href="shoppingCart.html"><img src="cart.png" alt="Cart" width="50" height="50"  style="float: right;"></a></li></button>

    </ul>

    <br style = “line-height:10”>

    <h1>Shopping Cart</h1>
    <br style = “line-height:10”>
<div class="shopping-cart">

  <table>
    <tr>
      <th scope="col"></th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col"></th>
      <th scope="col">Total</th>
    </tr>
    <tr>
      <td><img src="https://s.cdpn.io/3/dingo-dog-bones.jpg"></td>
      <td> <div class="product-title"></div>
        <p class="product-description"><?php echo $_SESSION['title']; ?> </p></td>
	<td>$<?php echo $_SESSION['price']; ?> </td>
      <td>
	<input type="number" name="quant" value="1" min="1">
      </td>
      <td><button class="remove">
        Remove
      </button></td>
      <td>$<?php echo $_SESSION['price']; ?> </td>
    </tr>

    <!--<tr>
      <div class="product">
      <td><img src="https://s.cdpn.io/3/dingo-dog-bones.jpg"></td>
      <td> <div class="product-title">Dingo Dog Bones</div>
        <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be begging for these things! I got curious once and ate one myself. I'm a fan.</p></td>
      <td>12.99</td>
      <td>
        <input type="number" value="1" min="1">
      </td>
      <td><button class="remove">
        Remove
      </button></td>
      <td>12.99</td>
    </tr>-->
  </table>

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <?php $subtot = $_SESSION['price'];
	$subtot = number_format($subtot, 2) ?> 
      <div class="totals-value" id="cart-subtotal"><?php echo $subtot ?></div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <?php $tax = $_SESSION['price'] * .05; 
	$tax = number_format($tax, 2); ?>
      <div class="totals-value" id="cart-tax"><?php echo $tax ?></div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">7.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <?php $tot = $subtot + $tax + 7.00;
	$tot = number_format($tot, 2); ?>
      <div class="totals-value" id="cart-total"><?php echo $tot ?></div>
    </div>
  </div>

      <button class="checkout">Checkout</button>
<br>
</div>
<script src="shoppingCart.js"></script>
</body>
</html>



