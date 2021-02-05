<?php
  include("../PHP/conn.php");
  include("../PHP/Seller(session).php");
?>
<!DOCTYPE html>
<html>
 <head>
  <title>View Product</title>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="../CSS/Seller(View Products).css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

  <script src="../JS/function.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 </head>
 <body>
     <?php
        include_once("../PHP/function.php");
        echo $format;
     ?>
  <div class="container box">
   <h1 align="center">Products</h1>
   <br>
   <div class="table">
    <br>
    <div id="alert_message"></div>
    <table id="user_data" class="table">
     <thead>
      <tr>
       <th></th>
       <th>Name</th>
       <th>Description</th>
       <th>Price</th>
       <th>Quantity</th>
       <th>Status</th>
       <th>Action</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"../PHP/Seller(fetch product).php",
     type:"POST"
    }
   });
  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"../PHP/Seller(update product).php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"../PHP/Seller(delete product).php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>

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