<?php
        include("../PHP/conn.php");
      include("../PHP/Customer(session).php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../CSS/Customer(Category).css">
   <link rel="stylesheet" href="../CSS/aos.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="../JS/function.js"></script>
   <title>Products</title>
</head>
<body>
    <div class="logo" id="TOP">
         <img src="../img/B&B Logo.png" alt="Bits & Bytes Logo" onclick="home()">
     </div>
     <div class="menu">
      <button class="menu-button"><?php echo $CusUsername ?></button>
      <div class="dropdown-menu">
          <a href="../HTML/Customer(Account).php">Profile</a>
          <a onclick="return confirm('Are you sure you want to Logout?')" href="../PHP/Customer(logout).php">Logout</a>
      </div>
  </div>
    <div class="search">
      <input type="text" placeholder="Search.." name="search" id="search" autocomplete="off">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

      <div class="contents" id="show-list">
      </div>
   </div>
     <div class="navi">
      <ul>
         <li><a href="../HTML/Customer(Home).php">HOME</a></li>
         <li><a href="../HTML/Customer(Category).php">PRODUCTS</a></li>
         <li><button class="btn1" onclick="sellonbb()">Sell on B & B</button></li>
         <li>
            <form action="#" class="font-size-14 font-rale">
               <a href="../Cart.php" class="py-2 rounded-pill color-primary-bg">
                  <span class="font-size-16 px-1 text-white"><i class="fas fa-cart-plus"></i></span>
                     <?php
                        if (isset($_SESSION['mycart'])){
                           $a = 0;
                           foreach($_SESSION['mycart'] as $k => $v)
                           {
                              $q = $v['Quantity'];
                              $a += $q;
                           }
                           echo "<span id=\"cart_count\">$a</span>";
                       }else{
                           echo "<span id=\"cart_count\">0</span>";
                       }
                        ?>
                  </span>
               </a>
            </form>
         </li>
     </ul>
     </div>
     <?php
         $Laptops = "SELECT * FROM `product` WHERE `CategoryID` = 1";
         $Keyboard = "SELECT * FROM `product` WHERE `CategoryID` = 2";
         $Mouse = "SELECT * FROM `product` WHERE `CategoryID` = 3";
     ?>
   </div>
      <div style="z-index: -3;"data-aos="fade-left" onclick="window.location.href='../index.php#laptops'" class="laptops">
         <h1>Laptops</h1>
      </div>
      <div data-aos="fade-right" onclick="window.location.href='../index.php#keyboard'" class="keyboards">
         <h1>Keyboards</h1>
      </div>
      <div data-aos="fade-left" onclick="window.location.href='../index.php#mouse'" class="mouse">
         <h1>Mouse</h1>
      </div>
   </div>
   <div class="TOP">
      <a href="#TOP">Back To Top</a>
  </div>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script src="../JS/aos.js"></script>
   <script>
     AOS.init({
         offset: 200,
         duration: 2500,
     });
   </script>

   <script>
      $(document).ready(function(){
         $("#search").keyup(function(){
            var searchText = $(this).val();
            if(searchText!= ''){
               $.ajax({
                  url:'../PHP/Customer(search).php',
                  method:'post',
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
</body>
</html>