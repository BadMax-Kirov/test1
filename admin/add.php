<?php
    include_once '../elems/init.php';
    
    if(!empty($_SESSION['auth'])){
      $title = '';
      $url ='';
      $text ='';
    echo $content = '
        <div class = "main">
        <form class = "input" method="POST">
        <div class="field">
        <label>title</label>
        <input name="title" value="'. $title . '"><br>
        </div>
        <div class="field">
        <label>url</label>        
        <input name="url" value="'. $url . '"><br>
        </div>
        <div class="field">
        <label>text</label>
        <input name="text" value="'. $text . '"><br>
        </div>
        
        <input type="submit" value="Занести данные в базу">
        </form>
        </div>';
    
    }else{ include_once 'elems/login.php'; }
    
    function addPage($link)
     {
        if (isset($_POST['url']) and isset($_POST['title']) and isset($_POST['text'])){
            $title = $_POST['title'];
            $url = $_POST['url'];
            $text = $_POST['text'];
            
            if(!empty($_POST['url']) AND !empty($_POST['title']) AND !empty($_POST['text'])){
                $query = "INSERT INTO pages SET title = '$title', url ='$url', text='$text'";
                   
                mysqli_query($link, $query); 
                header('location: /admin/');
            }else{
                echo 'Не заполнено одно из полей!';
            }
        }
    }
       
    addPage($link);   
?>
    </body>
</html>
