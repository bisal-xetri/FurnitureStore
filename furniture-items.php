<?php include('config/constant.php'); ?>
<?php include('partial-front/menu.php'); ?>

<div class="chair-type">
    <?php
    $sql2 = "SELECT * FROM tbl_furniture WHERE  active='Yes' AND Featured='Yes' ";
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

<?php include('partial-front/footer.php'); ?>