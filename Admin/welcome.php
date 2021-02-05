<?php
include('security.php');  //https://www.youtube.com/watch?v=IqrBr-KT5qk&t=371s 
?>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
</head>
<style>
    .font-tangerine {
        font-family: "Tangerine", serif;
        font-size: x-large;
}
</style>
<body onLoad = "renderTime(), background()">
    <div class = "flex-container">
	    <div id = "content1" class = "content">
		    <div class="w3-container">
                <div class="w3-display-middle">
                    <span class=" w3-opacity-min w3-center w3-padding-large w3-round-large w3-jumbo w3-wide w3-animate-opacity" id="ClockDisplay" style="background-color:rgb(255, 255, 255, 0.4);">  
                    </span>  
                    <p class="font-family:Consolas w3-xlarge w3-center" id="greet" ></p>
                    <a href="index.php" id="start">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Lets's Get Started !
                </a>
                </div>     
            </div>
		</div>
</body>
    <!-- Author
        <span wfd-id="652">Photo by <a href="https://unsplash.com/@federicorespini?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Federico Respini</a> on <a href="https://unsplash.com/@federicorespini?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
        <span wfd-id="12815">Photo by <a href="https://unsplash.com/@ilumire?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Jelleke Vanooteghem</a> on <a href="https://unsplash.com/s/photos/afternoon-tea?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
        <span wfd-id="2994">Photo by <a href="https://unsplash.com/@tinchofranco?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Tincho Franco</a> on <a href="https://unsplash.com/s/photos/sunset?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
        <span wfd-id="5168">Photo by <a href="https://unsplash.com/@a_uem?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Akinori UEMURA</a> on <a href="https://unsplash.com/s/photos/night-view?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
    -->
<?php
include('includes/scripts.php');
?>
