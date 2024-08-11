<?php 

function is_keyword_exists($haystack, $needle) {
    return strpos($haystack, $needle) !== false;
}
session_start();
$path = strtolower($_SERVER['REQUEST_URI']);
if(!isset($_SESSION['userinfo'])) {
    if(!is_keyword_exists($path, "login.php")){
        header("Location: login.php");
    }
}
if(isset($_SESSION['userinfo']) && is_keyword_exists($path, "login.php")){
    if(!is_keyword_exists($path, "logout.php")){
        header("Location: DirectPage.php");
    }
    
}
