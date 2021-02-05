<?php
    include("../PHP/conn.php");
    include("../PHP/Seller(session).php");
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../CSS/Seller(Home).css">
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="../CSS/aos.css">
    <script src="../JS/function.js"></script>
    <title>Seller Home</title>
  </head>
  <body>
    
    <?php
    include("../PHP/function.php");
    echo $format;
  ?>
<div>
  <span data-aos="fade-down-right" class="big-circle"></span>
  <span data-aos="fade-up-left" class="big-circle circle2"></span>
  <span data-aos="fade-up-right" class="big-circle circle3"></span>
  <span data-aos="fade-down-left" class="big-circle circle4"></span>
  <span data-aos="fade-up" class="big-circle circle5"></span>
</div>
<div data-aos="zoom-in" class="content">
  <h1>Welcome <?php echo $Username ?>,</h1>
  <p>Start selling today!</p>
</div>

<script>
  $('.button').click(function(){
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
  });
  $('.pro-btn').click(function(){
    $('nav ul .pro-show').toggleClass("show");
    $('nav ul .first').toggleClass("rotate");
  });
  $('.ord-btn').click(function(){
    $('nav ul .ord-show').toggleClass("show1");
    $('nav ul .second').toggleClass("rotate");
  });
  $('nav ul li').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });
  </script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
      duration: 2200,
  });
</script>
  </body>
</html>
