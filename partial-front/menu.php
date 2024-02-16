<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Himalayan Furniture</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/furniture-list.css">
    <link rel="stylesheet" href="CSS/chair.css">
    <link rel="stylesheet" href="CSS/furniture-details.css">
</head>

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
            <li><a href="<?php echo SITEURL; ?>user-signup.php">Sign In</a></li>
            <li><a href="<?php echo SITEURL; ?>user-login.php">Log in</a></li>
        </div>
        <a href="#" class="trolley">
            <button class="trolley-button">
                <img class="trolley-icon" src="Image/basket.png" alt="" />
                <div class="add-to-cart-count js-cart-quantity">0</div>
            </button>

        </a>
    </div>