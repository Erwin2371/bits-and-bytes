<?php
include('security.php'); 
include('component.php');  

include('includes/header.php'); 
include('includes/nav.php'); 
include('includes/functions.php'); 

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['mycart'] as $key => $value){
            if($value["ProductID"] == $_GET['id']){
                unset($_SESSION['mycart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'Cart.php'</script>";
            }
        }
    }
  }

$sql="select product.*,category.CategoryType from product,category where product.CategoryID=category.CategoryID order by product.ProductID desc";
$res=mysqli_query($connection,$sql);
?>
<body class="bg-light">

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h5>My Cart</h5>
                <hr>

<?php
$total = 0;
    if (isset($_SESSION['mycart'])){;

        while ($row = mysqli_fetch_assoc($res)){
            foreach ($_SESSION['mycart'] as $key => $values){
                if ($row['ProductID'] == $values['ProductID']){
                    cartElement($row['Photo'], $row['Name'],$row['Price'], $row['ProductID'], $values['Quantity']);
                    $total = $total + (int)$row['Price'];
                }
            }
        }
    }else{
        echo "<h5>Cart is Empty</h5>";
    }
?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['mycart'])){
                                $item = 0;
                                foreach($_SESSION['mycart'] as $key => $val)
                                {
                                    $e = $val['Quantity'];
                                    $item += $e; 
                                }
                                $count  = count($_SESSION['mycart']);
                                echo "<h6>Price ($item items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>RM<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>RM
                            <?php
                            echo $total;
                            ?>
                        </h6>
                        <form action="checkout.php">
                            <button type="submit" class="btn btn-info my-3">Check Out <i class="fas fa-dollar-sign"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('top.php'); 
?>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</body>
</html>