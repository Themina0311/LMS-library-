<?php
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // User ID validation: U001 format
    if (!preg_match("/^U[0-9]{3}$/", $user_id)) {
        $message = "User ID must be like U001";
    }
    // Password validation
    elseif (strlen($password) <= 8) {
        $message = "Password must be more than 8 characters";
    }
    // Email validation
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format";
    }
    else {
        // Check existing username or email
        $check = "SELECT * FROM user WHERE username='$username' OR email='$email'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            $message = "Username or email already exists";
        } else {
            $sql = "INSERT INTO user (user_id, first_name, last_name, username, password, email)
                    VALUES ('$user_id', '$first_name', '$last_name', '$username', '$password', '$email')";

            if (mysqli_query($conn, $sql)) {
                $message = "Admin registered successfully";
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
</head>
<body>

<h2>Admin Registration</h2>

<p style="color:red;"><?php echo $message; ?></p>

<form method="POST" action="">
    <label>User ID</label><br>
    <input type="text" name="user_id" placeholder="U001" required><br><br>

    <label>First Name</label><br>
    <input type="text" name="first_name" required><br><br>

    <label>Last Name</label><br>
    <input type="text" name="last_name" required><br><br>

    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Register</button>
</form>

<br>
<a href="login.php">Already have an account? Login</a>

</body>
</html>