<?php
session_start();
$connection=mysqli_connect("localhost","root","","b&b","3308");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/b&b/');
define('SITE_PATH','http://127.0.0.1/php/b&b/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>