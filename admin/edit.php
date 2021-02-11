<?php
    include '../elems/init.php';
   
    if(!empty($_SESSION['auth'])){
        function getPage($link)
        {
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "SELECT title,url FROM pages WHERE id = '$id'";
                $result = mysqli_query($link, $query);

                for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

                foreach ($data as $value) {
                    $title = $value['title'];
                    $url = $value['url'];   
                }
            }else echo 'Не найдена глобальная переменная';

            echo $content = '
            <div class = "main">
            <form class = "input" method="POST">
            <div class="field">
            <label>title</label>
            <input name="title" value="'. $title . '"><br>
            </div>
            <div class="field">
            <label class = "label">url</label>
            <input name="url" value="'. $url . '"><br>
            </div>
            <input type="submit" value="Обновить данные в базе">
            </form>
            </div>';
         }
    getPage($link);
    }else{ include_once 'elems/login.php'; }
    
    function editPage($link)
     {
        if (isset($_POST['url']) and isset($_POST['title'])){
            $id = $_GET['id'];
            $title = $_POST['title'];
            $url = $_POST['url'];
            
            $query = "UPDATE pages SET title = '$title', url ='$url' "
                   . "WHERE id= '$id'";
            mysqli_query($link, $query); 
            header('location: /admin/');
        }
    }
    editPage($link);

