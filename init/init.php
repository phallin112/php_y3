<?php 
ob_start();
session_start();
// include the functions
require_once('init/db.init.php');

// connect to the database
require_once('func/user.func.php'); 

// for manage user
require_once('func/manage/user.mn.func.php');
// for manage category
require_once('func/manage/category.manage.php');
// for manage product
require_once('func/manage/product.manage.php');
require_once('func/manage/stock.manage.php');
require_once('func/manage/cart.manage.php');

?>