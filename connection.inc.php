<?php
session_start();
$con=mysqli_connect("localhost","root","","groceryhub");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/grocery-admin/admin/');
define('SITE_PATH','http://localhost:4433/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'grocery-admin/admin/media/product/');

?>