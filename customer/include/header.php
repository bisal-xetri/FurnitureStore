<?php
session_start();
include_once('include/dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>E-Commerce</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../CSS/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<?php
// Assuming $con is your database connection
if (isset($_SESSION['username'])) {
  $cust_id = $_SESSION['id'];
  $query = "SELECT * FROM cart WHERE user_id=$cust_id";
  $run = mysqli_query($con, $query);

  if ($run) {
    $count = mysqli_num_rows($run);
  } else {
    // Handle query execution failure
    echo "Error: " . mysqli_error($con);
    $count = 0;
  }
} else {
  $count = 0;
}
?>


<body>
  <div class="header">
    <div class="title">
      <h1><a href="<?php echo SITEURL; ?>">Himlayan Furniture</a></h1>
    </div>

    <form class="search" action="<?php echo SITEURL; ?>furniture-search.php" method="POST">
      <input class="search-box" name="search" type="search" placeholder="search" required />
      <button class="search-button" type="submit" name="submit">
        <img class="search-icon" src="Image/searchicon.png" alt="" />
      </button>
    </form>

    <div class="navbar">
      <li><a href="<?php echo SITEURL; ?>">Home</a></li>
      <li><a href="<?php echo SITEURL; ?>products.php">Products</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact Us</a></li>
      <?php if (isset($_SESSION['username'])) {


      ?>

        <li><a href="<?php echo SITEURL; ?>customer/index.php">Account</a></li>
      <?php }
      ?>
    </div>
    <a href="cart.php" class="trolley">
      <button class="trolley-button">
        <img class="trolley-icon" src="Image/basket.png" alt="" />
        <div class="add-to-cart-count js-cart-quantity"><?php echo $count; ?></div>
      </button>

    </a>
  </div>