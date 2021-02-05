<?php
    // Seller Navi Bar
    $format = '    <div class="button">
    <span class="fas fa-bars"></span>
  </div>
<nav class="sidebar">
  <div class="text">Side Menu</div>
    
  <ul>
      <li class="active"><a href="../HTML/Seller(Home).php">Home</a></li>
      
      <li>
        <a href="#" class="pro-btn">Product<span class="fas fa-caret-down first"></span></a>
        <ul class="pro-show">
          <li><a href="../HTML/Seller(Add Product).php">Add Products</a></li>
          <li><a href="../HTML/Seller(View Products).php">View Products</a></li>
        </ul>
      </li>
      
      <li>
        <a href="#" class="ord-btn">Orders<span class="fas fa-caret-down second"></span></a>
        <ul class="ord-show">
          <li><a href="../HTML/Seller(View Orders).php">View Orders</a></li>
        </ul>
      </li>

      <li><a href="../HTML/Seller(Account).php">Account</a></li>
    </ul>
</nav>

<div class="logo">
  <img src="../img/B&B Logo.png" alt="Bits & Bytes Logo" onclick="seller()">
</div>

<div class="logout">
<a onclick="return confirm(\'Are you sure you want to Logout?\')" href="../PHP/Customer(logout).php">Logout</a>
</div>';
?>