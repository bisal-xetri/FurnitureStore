<?php include('config/constant.php') ?>

<?php include('partial-front/menu.php') ?>

<link rel="stylesheet" href="CSS/buy.css">
<?php
if (isset($_GET['furniture_id'])) {
    //get the fourniure id and 
    $furniture_id = $_GET['furniture_id'];
    //get details of the selected
    $sql = "SELECT* FROM tbl_furniture WHERE id = $furniture_id";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        header("Location:" . SITEURL);
    }
} else {
    //redirect tohome
    header('Location:' . SITEURL);
}
?>

<div class="main">
    <form action="" method="post" class="order">
        <fieldset>
            <legend>Selected Furniture</legend>
            <div class="selected-furniture">
                <div class="selected-furniture-img">
                    <?php
                    if ($image_name == "") {
                        //img not available
                        echo "<div class='error'>Image not available</div>";
                    } else {
                    ?>
                        <img src="<?php echo SITEURL; ?>/Image/furniture/<?php echo $image_name; ?>" alt="" class="selected-image" />
                    <?php

                    }

                    ?>

                </div>
                <div class="selected-furniture-des">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="furniture" value="<?php echo $title; ?>">
                    <p class="selected-furniture-price">Rs.<?php echo $price ?></p>
                    <input type="hidden" name="price" value="<?php echo $price ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" min="0" value="1" required />

                </div>
            </div>
        </fieldset>
        <fieldset class="user-details">
            <legend>Delivery Details</legend>
            <div class="order-label">Full Name</div>
            <input type="text" name="full-name" placeholder="E.g. Bishal Dhakal" class="input-responsive" required />

            <div class="order-label">Phone Number</div>
            <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required />

            <div class="order-label">Email</div>
            <input type="email" name="email" placeholder="E.g. bishal@gmail.com" class="input-responsive" required />

            <div class="order-label">Address</div>
            <textarea name="address" rows="5" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

        </fieldset>

        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary" />

    </form>
    <?php
    if (isset($_POST['submit'])) {
        //get all the details of the order
        $furniture = $_POST['furniture'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $price * $qty; //
        $order_date = date("Y-m-d h:i:s");
        $status = "Ordered"; //
        $customer_name = $_POST['full-name'];
        $customer_contact = $_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_address = $_POST['address'];

        $sql2 = "INSERT INTO tbl_order SET
        furniture='$furniture',
        price=$price,
        qty=$qty,
        total=$total,
        order_date='$order_date',
        status='$status',
        customer_name='$customer_name',
        customer_contact='$customer_contact',
        customer_email='$customer_email',
        customer_address='$customer_address'
        ";
        $res2 = mysqli_query($con, $sql2);
        if ($res2) {
            $_SESSION['order'] = "<div class='success text-center' style='text-align:center;color:green;'>Furniture order Success.</div>";
            header("location:" . SITEURL);
        } else {
            $_SESSION['order'] = "<div class='error' style='text-align:center;color:red;'>Failed to order Furniture.</div>";
            header("location:" . SITEURL);
        }
    } else {
    }
    ?>
</div>
<?php include('partial-front/footer.php') ?>