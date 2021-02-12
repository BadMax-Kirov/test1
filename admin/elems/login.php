
<?php
 
    if(!empty($_POST['log']) AND !empty($_POST['pass'])){
       $log = $_POST['log'];
       $pass = $_POST['pass'];
       
       $query = "SELECT * FROM users WHERE login = '$log' AND password = '$pass'"
              or die ('ERROR!');
       $result = mysqli_query($link, $query);
       
       $user = mysqli_fetch_assoc($result);
       if(!empty($user))
       {
           $_SESSION['auth'] = true;
           header ('location: \admin');
       }else{
           header('location: \admin');
       }
    }else {
?>
        <form action="" method="POST">
            <label>login</label>
            <input  name="log" id="log" value=""><br>
            <label>password</label>
            <input type="password" name="pass" id ="pass" value=""><br>
            <input type="submit" value="отправить данные">
        </form>
<?php } 
