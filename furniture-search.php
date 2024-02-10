<?php include('config/constant.php'); ?>
<?php include('partial-front/menu.php'); ?>

<div class="wallpaper">
    <img class="wallpaper-img" src="Image/wallpaper2.jpg" alt="" />
    <div class="sologon">
        <?php
        $search =  mysqli_real_escape_string($con, $_POST['search']);
        ?>

        <h2>Furniture on Your Search <span style="color:#fb5607;">"<?php echo $search ?>"</span></h2>
    </div>
</div>
<div class=explore-div>
    <h3><a class="explore" href="">Furniture Items</a></h3>
</div>
<div class="chair-type">
    <?php


    ////sql query to get food based on search

    $sql = "SELECT * FROM tbl_furniture WHERE title LIKE '%$search%' OR description LIKE '%$search%'";


    //execute query
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $description = $row['description'];
            $image_name = $row['image_name'];
    ?>
            <div class="chair-info">
                <div class="chair-picture">
                    <?php
                    if ($image_name == '') {
                        echo "<div class='error'>Image not available.</div>";
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
                    <button class="add-to-cart">add to cart</button>
                </div>
            </div>

    <?php

        }
    } else {
        echo "<div class='error'>Furniture not found</div>";
    }
    ?>


</div>
<?php include('partial-front/footer.php'); ?>