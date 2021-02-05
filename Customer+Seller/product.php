<?php
include('security.php'); 
include('component.php');  

include('includes/header.php'); 
include('includes/nav.php'); 
include('includes/functions.php');

$id = $_GET['ProductID'];

if(filter_var($id,FILTER_VALIDATE_INT) === false){
	die("Error 404");
}

try{
	$sql = 'SELECT * FROM product WHERE ProductID = '.$id.' LIMIT 1';
	$result = mysqli_query($connection,$sql);
}
catch (Exception $e){
	$error = $e->getMessage();
}
$rows = $result->num_rows;
if(!$rows){
	echo "No Result Found";
}
else{
	while($product = $result->fetch_assoc()) {
?>

<!-- Product Detail Page Start -->
<form action="index.php" method="post"> 
	<div class="product-detail">
		<div class="container" class="bg-light text-white py-5">
			<div class="product-detail-left">
				<div class="sp-loading">
					<img src="image/sp-loading.gif">
					Loading Images
				</div>
				<div class="sp-wrap">
					<a href="Product-Images/<?php echo $product['Photo']; ?>"><img src="Product-Images/<?php echo $product['Photo']; ?>" alt=""></a>
					<a href="Product-Images/<?php echo $product['Photo2']; ?>"><img src="Product-Images/<?php echo $product['Photo2']; ?>" alt=""></a>
				</div>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<div class="quantity">
				Quantity:
				<input type="number" name="Quantity" min="1" value="1"></div>
				<script>
					jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });
				</script>
			</div>
			<div class="product-detail-right">
				<h3><?php echo $product['Name']; ?><br><small>Code : GA00006488</small></h3>
				<h5><b>Price (RM) : </b><?php echo $product['Price']; ?></h5>
				<h5><b>Brand : </b> Bits & Bytes</h5>
				<h5><b>Warranty : </b> 12 Months</h5>
				<h5><b>Delivery of the city : </b> Free</h5>
				<h5><b>Payment : </b> COD, Visa, Mastercard, Debit, Credit, Installation</h5>
				<h5><b>Availability : </b> in Stock</h5>
				<a href="#" class="addtocart"><i class="fas fa-heart"></i> Add to Favourite</a>
				<a href="Review.php" class="writereview"><i class="fas fa-pen"></i> Write a review</a>
					<button type = "submit" class="buynow" name="add" data-id="1" ><i class="fas fa-shopping-cart"></i> Add to Cart</button>
					<input type='hidden' name='ProductID' value=<?php echo $product['ProductID'] ?>>
				</div>
				<div class="product-detail-feature">
					<h3>Descriptions</h3>
					<p><?php echo $product['Description']; ?></p>
				</div>
			</div>
		</div>
</form>
		<!-- Product Detail Page End -->

	
<?php

} // while
} // if

include("includes/scripts_product.php");
include("includes/footer.php");
?>
