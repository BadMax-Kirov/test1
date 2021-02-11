<?php
    if(!empty($_POST['log']) AND !empty($_POST['pass'])){
       $log = $_POST['log'];
       $pass = $_POST['pass'];
       
       $query = "SELECT * FROM users WHERE login = '$log' AND password = '$pass'";
       $result = mysqli_query($link, $query);
       
       $user = mysqli_fetch_assoc($result);
       
       if(!empty($user))
       {
           $_SESSION['auth'] = true;
           header ('location: \admin');
       }
    }else {
?>
        <form action="" method="POST">
            <label>login</label>
            <input  name="login" value="<?php $log ?>"><br>
            <label>password</label>
            <input type="password" name="pass" value="<?php $pass ?>"><br>
            <input type="submit" value="отправить данные">
        </form>
<?php var_dump($_POST);} 
