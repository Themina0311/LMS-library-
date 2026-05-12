<?php

include 'db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user 
            WHERE email='$email' 
            AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        echo "Login Successful";

    } else {

        echo "Invalid Email or Password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="loginbox">

<form action="" method="post">

<h2>Login</h2>

<div class="inputbox">
    <input type="email" name="email" required>
    <label>Email</label>
</div>

<div class="inputbox">
    <input type="password" name="password" required>
    <label>Password</label>
</div>  

<button type="submit" name="login">Login</button>

</form>

</div>

</body>
</html>