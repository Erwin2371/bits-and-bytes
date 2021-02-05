<?php
        include("../PHP/conn.php");
        include("../PHP/Customer(session).php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/Customer(Home).css">
    <link rel="stylesheet" href="../CSS/aos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../JS/function.js"></script>
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
                    <!--product search -->
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
        <div style="z-index: -3" class="banner-title">
            <h1 style="z-index: -3" data-aos="fade-right">Welcome To B & B, <br> "Changes for the <span>Better</span>"</h1>
            <div  data-aos="flip-down" class="slider">
                <!-- slideshow -->
            </div> 
        </div>
        <div class="about">
            <div data-aos="flip-up">
                <h1>About us</h1>
            </div>
            <div data-aos="fade-left" class="about-us" id="about-us">
                <img src="../img/B&B Logo.png" alt="">
                <p>Bits & Bytes is a IT ecommerce platform where people can sell and buy old or new IT products such as Laptops and Computer Accessories...</p>
            </div>
        </div>
        <div class="products">  
            <div data-aos="flip-up" class="featured-products">
                <h1>Product Brands</h1>
            </div>
            <div  data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1500" class="product-info">   
                <div class="product-brand s1">    
                    <img src="https://c4.wallpaperflare.com/wallpaper/625/657/280/asus-logo-digital-art-wallpaper-preview.jpg" alt="">
                </div>
                <div class="product-brand">
                    <img src="https://wallpapercave.com/wp/wp3691373.jpg" alt="">
                </div>
                <div class="product-brand">
                    <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/c912aa42-301c-4141-a624-745ab5702e03/dc8q1ww-20360b90-2838-43d0-9926-cf391efe14af.png" alt="">
                </div>
                <div class="product-brand">
                    <img src="https://perfectgamer.org/wp-content/uploads/2020/05/Razer-Banner.jpg" alt="">
                </div>
            </div>
            <div class="navigate-bar">
                <label for="a1" class="bar"></label>
                <label for="a2" class="bar"></label>
                <label for="a3" class="bar"></label>
                <label for="a4" class="bar"></label>
            </div>
        </div>
        <p class="p-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quas voluptas rem adipisci odio dicta aut optio accusantium laborum saepe.</p>
        <div class="contact">
            <div data-aos="flip-up" class="contact-info">
                <h1>Contact</h1>
            </div>
            <div class="contact-details">
                <div class="map">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31873.174810067398!2d101.68298123955077!3d3.055345399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4abb795025d9%3A0x1c37182a714ba968!2sAsia%20Pacific%20University%20of%20Technology%20%26%20Innovation%20(APU)!5e0!3m2!1sen!2smy!4v1594444871313!5m2!1sen!2smy" width="500" height="550" frameborder="0" style="border:0;" allowfullscreen="" 
                     aria-hidden="false" tabindex="0"></iframe>

                     <div class="location">
                         <h1>Location</h1>
                        <p>Address: <a href="https://g.page/AsiaPacificUniversity?share" target="_blank">Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</a></p>
                        <hr>
                        <h1>Details</h1>
                        <p>Opening Hours</p>
                        <table border="1" bordercolor="white">
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                            </tr>
                            <tr>
                                <td>Monday</td>
                                <td>9am - 6pm</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>9am - 6pm</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>9am - 6pm</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td>9am - 6pm</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>9am - 6pm</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>9am - 6pm</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>Closed</td>
                            </tr>
                        </table>
                        <div class="phone">
                            <p>Further inquiries please contact the number below</p>
                            <hr>
                            <p>Phone: <a href="tel:+03-8996 1000">03-8996 1000</a></p>
                        </div>
                    </div>
                </div>
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
            $(document).on('click','.contents a', function(){
                $("#search").val($(this).text());
                $("#show-list").html('');
            })
        })
    </script>
</body>
</html>