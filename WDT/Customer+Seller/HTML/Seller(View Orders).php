<?php
  include("../PHP/conn.php");
  include("../PHP/Seller(session).php");
?>
<!DOCTYPE html>
<html>
 <head>
  <title>View Orders</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link rel="stylesheet" href="../CSS/Seller(View Orders).css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <script src="../JS/function.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 </head>
 <body>
     <?php
        include_once("../PHP/function.php");
        echo $format;
     ?>
<div class="container box">
   <h1 align="center">Orders</h1>
   <br>
   <div class="table">
    <br>
    <div id="alert_message"></div>
    <table id="user_data" class="table">
     <thead>
      <tr>
       <th></th>
       <th>Product Name</th>
       <th>Customer</th>
       <th>Quantity</th>
       <th>Order Date</th>
       <th>Delivery Status</th>
       <th>Order Status</th>
       <th>Action</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
  
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
         url:"../PHP/Seller(fetch orders).php",
         type:"POST"
        }
      });
    }
    function update_data(id, column_name, value)
  {
   $.ajax({
    url:"../PHP/Seller(update orders).php",
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
   $(document).on('click', '.update1', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = "";
   if($(this).text() == "Not Delivered")
   {
     value = "Delivered";
   }
   else
   {
     value = "Not Delivered";
   }
   update_data(id, column_name, value);
  });

    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to remove this?"))
      {
        $.ajax({
          url:"../PHP/Seller(delete orders).php",
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

<script>
  function rmvcont(){
    var arr=document.getElementsByTagName("div");
       for(var i=0;i<document.getElementsByTagName("div").length;i++)
     document.getElementsByTagName("div")[i].removeAttribute("contenteditable");    
  }
  </script>

</body>
</html>