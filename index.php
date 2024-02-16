<?php include('config/constant.php'); ?>
<?php include('partial-front/menu.php'); ?>



<div class="wallpaper">
  <img class="wallpaper-img" src="Image/wallpaper2.jpg" alt="" />
  <div class="sologon">
    <h2>"Elevate Your living Standard"</h2>
    <a class="more" href="">See More...</a>
  </div>
</div>
<div class=explore-div>
  <h3><a class="explore" href="">Explore Now</a></h3>
</div>
<div class="category-container">
  <?php
  $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes'  LIMIT 3";
  $res = mysqli_query($con, $sql);
  $count = mysqli_num_rows($res);
  if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $id = $row['id'];
      $title = $row['title'];
      $image_name = $row['image_name'];
  ?>
      <a href="<?php SITEURL; ?>category-furniture.php?category_id=<?php echo $id; ?>">
        <div class="category-img">
          <?php
          if ($image_name == '') {
            echo "<div class='error'>Image not available</div>";
          } else {
            //img available
          ?>
            <img src="<?php echo SITEURL; ?>Image/Category/<?php echo $image_name; ?> " alt="">
          <?php
          }
          ?>
          <div class="category-name"><?php echo $title; ?></div>
        </div>
      </a>
  <?php
    }
  } else {
    echo "<div class='error'> Category not available</div>";
  }
  ?>
</div>
<div class=explore-div>
  <h3><a class="explore" href="">Furniture Items</a></h3>
</div>
<div class="chair-type">
  <?php
  $sql2 = "SELECT * FROM tbl_furniture WHERE  active='YES' AND Featured='YES' limit 5";
  $res2 = mysqli_query($con, $sql2);
  $count2 = mysqli_num_rows($res2);
  if ($count2 > 0) {
    while ($row = mysqli_fetch_assoc($res2)) {
      $id = $row['id'];
      $title = $row['title'];
      $price = $row['price'];
      $image_name = $row['image_name'];
  ?>
      <div class="chair-info">
        <div class="chair-picture">
          <?php
          //check img available
          if ($image_name == '') {
            echo "<div class='error'>Image not available</div>";
          } else {
          ?>
            <a href="<?php echo SITEURL; ?>furniture-detail.php?image_id=<?php echo $id; ?>">
              <img src="<?php echo SITEURL; ?>Image/furniture/<?php echo $image_name; ?>" alt="" />
            </a>
          <?php
          }

          ?>

        </div>
        <div class="chair-description">
          <p class="chair-name"><?php echo $title; ?></p>
          <p class="chair-price">Rs.<?php echo $price; ?></p>
          <a href="<?php echo SITEURL;  ?>order.php?furniture_id=<?php echo $id; ?>" class="buy">buy</a>
          <button class="add-to-cart js-add-to-cart" data-product-id="<?php echo $id; ?>">add to cart</button>
        </div>
      </div>
  <?php
    }
  } else {
    echo "<div class='error'> Furniture Not available</div>";
  }
  ?>


</div>
<div class="seemore">
  <a href="furniture-items.php">see more...</a>
</div>
<?php include('partial-front/footer.php'); ?>