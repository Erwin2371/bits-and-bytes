<?php
include('security.php'); 
include('component.php');  

include('includes/header.php'); 
include('includes/nav.php'); 
include('includes/functions.php'); 

$sql="select product.*,category.CategoryType from product,category where product.CategoryID=category.CategoryID order by product.ProductID desc";
$res=mysqli_query($connection,$sql);
$total = 0;
    if (isset($_SESSION['mycart'])){
        $ProductID = array_column($_SESSION['mycart'], 'ProductID');

        while ($row = mysqli_fetch_assoc($res)){
            foreach ($ProductID as $id){
                if ($row['ProductID'] == $id){
                    $total = $total + (int)$row['Price'];
                }
            }
        }
    }else{
        echo "<h5>Cart is Empty</h5>";
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $PID = $_POST['product'];
        $Quantity = $_POST['quantity'];

        $order_sql = "INSERT INTO orders(CustomerID,ProductID,Quantity)VALUES($name,$PID,$Quantity)";
        $order_run = mysqli_query($connection,$order_sql);
        
        if($order_run){
            echo '<script>alert("Success")</script>';
        }
        else{
            echo '<script>alert("fail")</script>';
        }
    }

?>

<!-- Checkout Start -->
<div class="checkout">
    <div class="container">
        <h2>Your Order</h2>

        <!-- Checkout Inner Start -->
        <div class="checkout-inner" id="order">
            <form action="PHP/Customer(checkout).php" method="post" id="placeOrder">
                <div class="checkout-form-steps">
                    <h4>Personal Detail</h4>
                    <input type="text" class="textfield" name="name" placeholder="Your Name">
                    <input type="text" class="textfield" name="product" placeholder="Your Email">
                    <input type="text" class="textfield" name="quantity" placeholder="Your Phone No.">
                </div>
                <div class="checkout-form-steps">
                    <h4>Shipping Address</h4>
                    <select class="textfield">
                        <option>Select Country</option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>UAE</option>
                    </select>
                    <select class="textfield">
                        <option>Select State</option>
                        <option>State 1</option>
                        <option>State 2</option>
                        <option>State 3</option>
                    </select>
                    <input type="text" class="textfield" placeholder="Full Address">
                </div>
                <div class="checkout-form-steps">
                    <h4>Shipping Options</h4>
                    <label for="radio1">
                        <input type="radio" name="shippingoptions" id="radio1">
                        Delivery by courier - during the day free shipping
                    </label>
                    <label for="radio2">
                        <input type="radio" name="shippingoptions" id="radio2">
                        Urgent Delivery - delivery in 1 hour free shipping
                    </label>
                    <label for="radio3">
                        <input type="radio" name="shippingoptions" id="radio3">
                        Pickup - you can pickup 9AM to 8PM
                    </label>
                </div>
                <div class="checkout-form-steps">
                    <h4>Billing Options</h4>
                    <label for="radio4">
                        <input type="radio" name="billingoptions" id="radio4">
                        In Cash
                    </label>
                    <label for="radio5">
                        <input type="radio" name="billingoptions" id="radio5">
                        Visa
                    </label>
                    <label for="radio6">
                        <input type="radio" name="billingoptions" id="radio6">
                        Mobile Banking
                    </label>
                    <label for="radio7">
                        <input type="radio" name="billingoptions" id="radio7">
                        Wallet
                    </label>
                </div>
                <input type="submit" name="checkout" class="submitorder-button" value="Submit Order">
            </form>
        </div>
        <!-- Checkout Inner End -->
        <!-- Order List Start-->
        <div class="orderlist">
            <p name="quantity">Quantity : <span><?php
                            if (isset($_SESSION['mycart'])){
                                $count  = count($_SESSION['mycart']);
                                echo " ($count items)";
                            }else{
                                echo " (0 items)";
                            }
                        ?></span></p>
            <p>Price (RM) : <span> <?php echo $total; ?></span></p>
            <input type="text" class="textfield" placeholder="Promo Code : STORE8888">
            <input type="submit" class="applycode-button" value="Apply Promo Code">
            <p>Order Total (RM) : <span><?php echo $total; ?></span></p>
        </div>
        <!-- Order List End-->

    </div>
</div>
<!-- Checkout End -->
<?php
include("includes/scripts_product.php");
include("includes/footer.php");
?>