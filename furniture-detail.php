<?php include('config/constant.php'); ?>
<?php include('partial-front/menu.php'); ?>

<div class="main-detail">
  <?php


  $image_id = $_GET['image_id'];
  $sql = "SELECT * FROM tbl_furniture WHERE id=$image_id";
  $res = mysqli_query($con, $sql);
  $count = mysqli_num_rows($res);
  if ($count == 1) {
    $row = mysqli_fetch_assoc($res);
    $id = $row['id'];
    $title = $row['title'];
    $price = $row['price'];
    $description = $row['description'];
    $image_name = $row['image_name'];
  ?>
    <div class="detail-image">
      <?php
      if ($image_name == '') {
        echo "<div class='error'>Image not available</div>";
      } else {
      ?>
        <img src="<?php echo SITEURL; ?>Image/furniture/<?php echo $image_name; ?>" alt="" />

      <?php
      }
      ?>
    </div>
    <div class="detail-content">
      <h1><?php echo $title; ?></h1>
      <div class="star">
        <img src="Image/star.png" alt="" />
        <span>(0 reviews)</span>
      </div>
      <p class="detail-description">
        <?php echo $description; ?>
      </p>
      <h3 class="detail-price">Rs.<?php echo $price; ?></h3>
      <div class="detail-quantity">
        <button>-</button>
        <span>3</span>
        <button>+</button>
      </div>
      <div class="detail-buy">
        <button class="buy-option">Buy Now</button>
        <button class="addtocart-option js-add-to-cart" data-product-id="<?php echo $id; ?>">Add to Cart</button>
      </div>
    </div>
  <?php
  } else {
    echo "<div class='error'> Furniture Not available</div>";
  }


  ?>
</div>
<?php include('partial-front/footer.php'); ?>