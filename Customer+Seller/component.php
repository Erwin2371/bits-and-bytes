<?php

function component($productname,$productprice,$productimg,$productid){
    $element ="
        <div class=\"swiper-slide\">
            <div class=\"slider-box\">
            <p class=\"time\">New</p>
            <article class=\"product\">
                <div class=\"img-container\">
                    <img src=\"./Product-Images/$productimg\" alt=\"Image1\" class=\"product-img\">
            <form action=\"index.php\" method=\"post\">  
                <button type=\"submit\" class=\"bag-btn\" name=\"add\" data-id=\"1\">
                <input type='hidden' name='ProductID' value='$productid'>
            </form>    
                <i class=\"fas fa-shopping-cart\"></i>
                add to cart
                </button>
                </div>
                <h3>$productname</h3>
                <h6>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"far fa-star\"></i>
                </h6>
                <form action=\"product.php\" method=\"get\"> 
                 <button type=\"submit\" class=\"badge my-3\" name=\"loop\"> <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    View Details
                    <i class=\"far fa-comment-exclamation\"></i></button>
                 <input type='hidden' name='ProductID' value='$productid'>
                 <input type='hidden' name='ProductName' value='$productname'>
                </form>
                <h4>RM$productprice</h4>
            </article>
            </div>
        </div>     
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid, $productquantity){
    $element = "
    <form action=\"Cart.php?action=remove&id=$productid\" method=\"post\">
        <div class=\"border rounded\">
            <div class=\"row bg-white\">
                <div class=\"col-md-3 pl-0\">
                    <img src=\"./Product-Images/$productimg\" alt=\"Image1\" class=\"img-fluid\">
                </div>
                <div class=\"col-md-6\">
                    <h5 class=\"pt-2\">$productname</h5>
                    <small class=\"text-secondary\">Seller: Bit & Bytes</small>
                    <h5 class=\"pt-2\">RM$productprice</h5>
                    <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                </div>
                <div class=\"col-md-3 py-5\">
                    <div>
                    Quantity:
                        <input type=\"text\" disabled value=\"$productquantity\" name=\"Quantity\" class=\"form-control w-25 d-inline\">

                    </div>
                </div>
            </div>
        </div>
    </form>
    
    ";
    echo  $element;
}