 <body>
<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
    <a class="navbar-brand" href="HTML/Customer(Home).php"><img src="img/B&B Logo.png" width="150px" height="50px" alt="B&B Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto font-rubik">
            <li class="nav-item">
                <a class="nav-link" href="HTML/Customer(Home).php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Products</a>
            </li>
      
            <li class="nav-item">
                <a class="nav-link" href="#">Coming Soon</a>
            </li>
        </ul>
        <form action="#" class="font-size-14 font-rale">
            <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                <span class="font-size-16 px-1 text-white"><i class="fas fa-cart-plus"></i></span>
                <span class="px-3 py-1 rounded-pill text-dark bg-light">
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
        
        </div>
    </div>
    </div>
</nav>