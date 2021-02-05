<?php
    include("../PHP/conn.php");
    include("../PHP/Customer(session).php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Customer(Account).css">
   <link rel="stylesheet" href="../CSS/aos.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"/>
   <script src="../JS/function.js"></script>
   <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <title>Account</title>
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
    <div class="navi">
        <ul>
            <li><a href="../HTML/Customer(Home).php">HOME</a></li>
            <li><a href="../HTML/Customer(Category).php">PRODUCTS</a></li>
            <li><button class="btn1" onclick="sellonbb()">Sell on B & B</button></li>
            <li>
                <form action="#" class="cart">
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
    $sql = "SELECT `FirstName`, `LastName`, `Username`, `Email`, `Address`, `ContactNumber`, `Password` FROM `customer` WHERE `CustomerID` = ?";
    $result = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($result, 's', $CusID);
    mysqli_stmt_execute($result);
    mysqli_stmt_store_result($result);
    mysqli_stmt_bind_result($result, $FirstName, $LastName, $Username, $Email, $Address, $ContactNumber, $Password);

    if(mysqli_stmt_num_rows($result) == 1)
    {
        while (mysqli_stmt_fetch($result))
        {
?>
 <div class="heading">
    <h1>Account</h1>
</div>
<div class="heading1">
    <h1>Details</h1>
</div>
<div class="container">

    <form action="../PHP/Customer(acc).php" method="POST" class="acc-form">
    <div class="field">
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" autocomplete="off" placeholder="Enter Your First Name" required name="FirstName" value="<?php echo $FirstName?>">
            <span>First Name:</span>
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Enter Your Last Name" autocomplete="off" required name="LastName" value="<?php echo $LastName?>">
            <span>Last Name:</span>
        </div>
    </div>
    <div class="field">
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" autocomplete="off" placeholder="Enter Your Username" class="Username" required name="Username" value="<?php echo $Username?>">
            <span>Username:</span>
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Enter a Password" autocomplete="off" minlength="8" required name="Password" value="<?php echo $Password?>">
            <span>Password:</span>
        </div>
    </div>
    <div class="field">
        <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Enter Your Email" autocomplete="off" required name="Email" value="<?php echo $Email?>">
            <span>Email:</span>
        </div>
        <div class="input-field">
            <i class="fas fa-phone"></i>
            <input type="tel" placeholder="Contact" autocomplete="off" minlength="11" maxlength="12" required name="ContactNumber" value="<?php echo $ContactNumber ?>">
            <span>Contact Number:</span>
        </div>
    </div>
    <div class="input-field one">
        <i class="fas fa-map-marker"></i>
        <input type="text" placeholder="Enter Your Current Address" autocomplete="off" id="Address" required name="Address" value="<?php echo $Address ?>">
        <span>Address:</span>
        </div>  
        <button class="Save" name="Save">Save Changes</button>
    </form>
</div>

   <?php
        }
    }
   ?>
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
