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
          <button class="dropbtn"><a href="../profiles/driverprof.php"><img src="../profiles/profpic.png" alt="Avatar" width="50" height="50" >
          </a></button>
          <div class="dropdown-content">
            <a href="catalog_home.php">CATALOG</a>
            <a href="#">SPONSORS</a>
            <a href="../logins/login.php">LOGOUT</a>
          </div>
        </div>

        <button class="dropbtn2"><li><a href="shoppingCart.php"><img src="cart.png" alt="Cart" width="50" height="50"  style="float: right;"></a></li></button>

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
      <th scope="col">Points</th>
    </tr>
    <tr>
    <td><img src="cart.png" alt="Product Image" width="400" height="400" ></td>
      <td> <div class="product-title"></div>
        <p class="product-description"><?php echo $_SESSION['title']; ?> </p></td>
	<td>$<?php echo $_SESSION['price']; ?> </td>
      <td>
	<input type="number" name="quant" value="1" min="1">
      </td>
      <td><button class="remove">
        Save
      </button></td>
      <td><?php $_SESSION['pointstot'] = $_SESSION['price'] * $_SESSION['ratio'];
		$_SESSION['pointstot'] = number_format($_SESSION['pointstot'], 2); 
		echo $_SESSION['pointstot'] ?> pts</td>
    </tr>

  </table>

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
	<?php $subtot = $_SESSION['price'];
	$subtot = number_format($subtot, 2) ?> 
		<div class="totals-value" id="cart-subtotal"><?php echo $subtot; ?>
			(<?php echo $_SESSION['pointstot'] ?> pts)</div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <?php $tax = $_SESSION['price'] * .05; 
	$tax = number_format($tax, 2); 
	$ptax = number_format($_SESSION['pointstot']*.05, 2); ?>
      <div class="totals-value" id="cart-tax"><?php echo $tax ?>
      (<?php echo $ptax ?> pts) </div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">7.00
      (<?php $ship = number_format(7 * $_SESSION['ratio'], 2);
	echo $ship; ?> pts)</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <?php $tot = $subtot + $tax + 7.00;
	$tot = number_format($tot, 2); 
	$ptot = number_format($_SESSION['pointstot']+$ptax+$ship, 2); 
	$_SESSION['total'] = $tot;
	$_SESSION['ptotal'] = $ptot; ?>
	<div class="totals-value" id="cart-total"><?php echo $tot ?> (<?php echo $ptot ?> pts)</div>
    </div>
  </div>
<form action="shoppingCart.php" method="post">
      <button class="checkout" type="submit" name="checkout">Checkout</button>
</form>
<br>
</div>
<script src="shoppingCart.js"></script>
</body>
</html>



