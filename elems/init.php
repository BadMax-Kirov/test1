<?php
    session_start();
    
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    
    $host = "localhost";
    $user = "root";
    $password = "root";
    $db_name = "test";
    
    $link = mysqli_connect($host,$user,$password,$db_name);
    mysqli_query($link,"SET NAMES 'utf8'");