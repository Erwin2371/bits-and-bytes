<?php
include('security.php'); 
include('component.php');  

include('includes/header.php'); 
include('includes/nav.php'); 
include('includes/functions.php'); 

if (isset($_POST['add'])){
    /// print_r($_POST['ProductID']);
    if(isset($_SESSION['mycart'])){

        $item_array_id = array_column($_SESSION['mycart'], "ProductID");

        if(in_array($_POST['ProductID'], $item_array_id)){
            echo "<script>alert('Product is already in the cart')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['mycart']);
            $item_array = array(
                'ProductID' => $_POST['ProductID'],
                'Quantity' => $_POST['Quantity']
            );

            $_SESSION['mycart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'ProductID' => $_POST['ProductID'],
                'Quantity' => $_POST['Quantity']
        );

        // Create new session variable
        $_SESSION['mycart'][0] = $item_array; 
    }
}

$laptop="Select * From product where CategoryID = 1 AND Status = 'Approve'";
$lap=mysqli_query($connection,$laptop);
$mouse="Select * From product where CategoryID = 3 AND Status = 'Approve'";
$mou=mysqli_query($connection,$mouse);
$keyboard="Select * From product where CategoryID = 2 AND Status = 'Approve'";
$key=mysqli_query($connection,$keyboard);
?>

<!-- hero -->
<header class="hero">
  <div class="banner">
    <h1 class="banner-title">Welcome to Bits&Bytes !</h1>
    <button onclick="document.location='index.php#laptops'" class="banner-btn" >shop now</button>
  </div>
</header>
<!-- end of hero -->
<?php
include('top.php'); 
?>
<!-- Banner Ads  -->
<section id="banner_adds">
    <div class="container py-5 text-center">
        <img src="banner/top banner.png" alt="banner1" class="img-fluid">
    </div>
</section>
<!-- end of Banner Ads  -->

<!-- Topbar -->
      
<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Search -->
<div class="search">
    <input type="text" placeholder="Search.." name="search" id="search" autocomplete="off">
    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    <div class="contents" id="show-list">
    </div>
</div>

<!-- products 1 -->
<section class="products" id="laptops">
  <div class="section-title">
    <h2 id="laptops">L A P T O P S</h2>
  </div>
  <div class="products-center">
<!-- single product 1 -->
<?php
  while($row = mysqli_fetch_assoc($lap)){
      component($row['Name'],$row['Price'],$row['Photo'],$row['ProductID']);
  }
?>
</section>
    <!-- end of single product 1 -->

  <!-- products 2 -->
<section class="products" id="mouse">
  <div class="section-title">
    <h2>M O U S E S</h2>
  </div>
  <div class="products-center">
<!-- single product 2 -->
<?php
  while($row = mysqli_fetch_assoc($mou)){
      component($row['Name'],$row['Price'],$row['Photo'],$row['ProductID']);
  }
?>
</section>
    <!-- end of single product 2 -->

     <!-- products 3-->
<section class="products" id="keyboard">
  <div class="section-title">
    <h2>K E Y B O A R D S</h2>
  </div>
  <div class="products-center">
<!-- single product 3 -->
<?php
  while($row = mysqli_fetch_assoc($key)){
      component($row['Name'],$row['Price'],$row['Photo'],$row['ProductID']);
  }
?>
</section>
    <!-- end of single product 3 -->
    
  </div>
<!-- Blogs -->
<section id="blogs">
    <div class="container py-4">
        <h4 class="font-rubik font-size-20">Latest Blogs</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Laptops</h5>
                    <img src="./blog/blog1.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Mouses</h5>
                    <img src="./blog/blog2.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Keyboards</h5>
                    <img src="./blog/blog3.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !Blogs -->
<script>
  $(document).ready(function(){
      $("#search").keyup(function(){
      var searchText = $(this).val();
      if(searchText!= ''){
          $.ajax({
              url:"search.php",
              method:"POST",
              data:{query:searchText},
              success:function(response){
                  $("#show-list").html(response);
              }
          })
      }
      else{
          $("#show-list").html('');
      }
      })
  $(document).on('click','a', function(){
      $("#search").val($(this).text());
      $("#show-list").html('');
  })
})
</script>

<?php

include('includes/scripts.php');
include('includes/footer.php');

?>
</body>
</html>