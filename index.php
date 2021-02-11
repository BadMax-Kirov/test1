<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    
    $host = "localhost";
    $user = "root";
    $password = "root";
    $db_name = "test";
    
    $link = mysqli_connect($host,$user,$password,$db_name);
    mysqli_query($link,"SET NAMES 'utf8'");
    
    
    if (isset($_GET['page']))
            $page = $_GET['page'];
    else
            $page = 'index';
    
    $query = "SELECT * FROM pages WHERE url='$page'";
    $result = mysqli_query($link,$query);
    $page = mysqli_fetch_assoc($result);

    if ($page){
        $title = $page['title'];
        $content = $page['text'];
    
    }else {
        $title = "Pages not found!";
        $content = "Pages not found!";
    }
    include 'elems\layout.php';
