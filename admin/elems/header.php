<?php
    $host = "localhost";
    $user = "root";
    $password = "root";
    $db_name = "test";
    
    $link = mysqli_connect($host,$user,$password,$db_name);
    mysqli_query($link,"SET NAMES 'utf8'");
    
    $query = "SELECT * FROM pages";
    $result = mysqli_query($link,$query);
  
    function createlink($href,$text){
        if ($_SERVER['REQUEST_URI'] == $href){
            echo "<a href=\"$href\" class=\"active\">$text</a>"; 
        }
        else{
            echo "<a href=\"$href\">$text</a>";
        }
    
    }
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    
    foreach ($data as $value) {
        createlink('/?page='.$value['url'],$value['title']);
}