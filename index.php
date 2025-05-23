<?php
require_once('init/init.php'); // initialize

include('includes/header.inc.php');
include('includes/navbar.inc.php');
// echo(  isset($_GET['page'])   );

// $user = LoggedInUser();  // can call varible($user) same in navbar, don't function(LoggedInUser) dotplicat= meaning ស្ទួន
if (isset($_GET['page'])) {
    $page = $_GET['page']; // about

    
    $admin_page = [
        'user/home',
        'user/create',
        'user/update',
        'user/delete',
        'category/home',
        'category/create',
        'category/update',
        'category/delete',
        'product/home',
        'product/create',
        'product/update',
        'product/delete',
        'stock/home',
        'stock/create',
        'stock/update',
        'stock/delete',
    ];
    $user_page = [
        'cart/home',
        'cart/create',
    ];

    $before_login_page = ['login', 'register'];
    $after_login_page = [
        'dashboard',
        ...$admin_page , // flat copy
        ...$user_page

    ];
    //var_dump($after_login_page);

    if (
        $page === 'logout' ||
        (in_array($page, $before_login_page)  &&  !LoggedInUser()) ||
        (in_array($page, $after_login_page) &&  LoggedInUser())
    ) {
        if (in_array($page, $admin_page) && !isAdmin()) {

            header('Location: ./');
        }
        if (in_array($page, $user_page) && !isUser()) {

            header('Location: ./');
        }
        include('page/' . $page . '.php');
    } 
    else if(in_array($page, $after_login_page) && !LoggedInUser()) {
        header('Location: ./?page=login');
    }
    else {
        header('Location: ./');
    }
} else {
    include('page/home.php');
}
include('includes/footer.inc.php');


$db->close();
