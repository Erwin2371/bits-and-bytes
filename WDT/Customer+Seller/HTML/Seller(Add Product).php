<?php
  include("../PHP/conn.php");
  include("../PHP/Seller(session).php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Seller(Add Products).css">
    <link rel="stylesheet" href="../CSS/jquery.nice-number.css"> 
    <link rel="stylesheet" href="../CSS/trix.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../JS/trix.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../JS/jquery.nice-number.js"></script>
    <title>Add Product</title>
  </head>
  <body>

    <?php

      include_once("../PHP/function.php");
      echo $format;
    ?>
<div class="heading">
  <h1>Add Your Product</h1>
</div>
<div class="form-group">
  <form action="../PHP/Seller(add product).php" onsubmit="return checkfile()" method="POST" enctype="multipart/form-data">
  <div class="field1">
    <label for="PName" class="LPname">Product Name:</label>
    <div class="input-field">
          <i class="fas fa-tag"></i>
          <input type="text" placeholder="Product Name" required name="PName" autocomplete="off">
        </div>
  </div>
    <div class="field1">
      <label for="PCategory" class="LPCategory">Product Category:</label>
      <div class="input-field">
        <select class="form-control" name="PCategory" required id="CategoryID">
          <option value="">Please Select a Category</option>
          <option value="1">Laptop</option>
          <option value="2">Keyboard</option>
          <option value="3">Mouse</option>
        </select>
      </div>
    </div>
<div class="field2">
  <label for="PPrice" class="LPrice">Product Price: RM</label>
  <div class="box-price">
    <input type="number" name="PPrice" required class="PPrice" min="0" max="9999" value="1">
  </div>
</div>
<div class="field2">
  <label for="PQuantity" class="LQuantity">Quantity:</label>
    <div class="box-quantity">
      <input type="number" type = "number" name="PQuantity" required class="PQuantity" min="0" max="500" value="1">
    </div>    
  </div>
<div class="field3">
  <label for="file" class="Limg">Image One:</label>
  <label for="file" id="selector" class="Pimg">Select Image</label>
  <input type="file" name="PPhoto" required id="file" onchange="loadfile(event)" accept="image/*" hidden>
    <div class="image-preview" id="image-preview">
      <img class="image-preview-image" id="image">
    </div>
  </div>
  <div class="field3">
  <label for="file2" class="Limg">Image Two:</label>
  <label for="file2" id="selector2" class="Pimg">Select Image</label>
  <input type="file" name="PPhoto2" required id="file2" onchange="loadfile2(event)" accept="image/*" hidden>
    <div class="image-preview" id="image-preview-2">
      <img class="image-preview-image-2" id="image2">
    </div>
  </div>
  <label for="content" class="LDesc">Product Description:</label>
<div class="field4">
  <div class="Rtext">
    <input type="hidden" required id="x" name="content">
    <trix-editor input="x" id="s" class="trix-content"></trix-editor>
  </div>
</div>
    <button class="Add" onclick="check()" Name="Add">Add Product</button>
  </form>
</div>

<script>
  function loadfile(event){
    var output = document.getElementById('image');
    output.src=URL.createObjectURL(event.target.files[0]);
  };
  function loadfile2(event){
    var output = document.getElementById('image2');
    output.src=URL.createObjectURL(event.target.files[0]);
  };
</script>

    <script src="../JS/function.js"></script>

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

<script>
  function check(){
  if(document.getElementById("file").files.length == 0 & document.getElementById("s").value == ''){
  alert("Please Provide an Image and Description for Your Product")
  }
  else if(document.getElementById("file").files.length == 0 ){
    alert("Please Select an Image for Your Product.")
  }
}
function checkfile(){
  if(document.getElementById("s").value == ''){
    alert("Please Provide Decription for Your Product")
    return false
  }
}
</script>

<script>
  $(function(){
$('input[type="number"]').niceNumber();
});
</script>

<script>
  $('input[type="number"]').function(){
    var len = $(this).text().length;
  if (len > 4)
  {
    $(this).text(.substr(0,4)+"...");
  }    
}
</script>

</body>
</html>