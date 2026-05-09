<?php
include 'db_config.php';

if(isset($_POST['submit'])){

    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $category = $_POST['category'];

    // Validation
    if(!preg_match("/^B[0-9]{3}$/", $book_id)){
        echo "Invalid Book ID!";
    }
    else{

        $sql = "INSERT INTO books(book_id, book_name, category)
                VALUES('$book_id','$book_name','$category')";

        if(mysqli_query($conn, $sql)){
            echo "Book Added Successfully!";
        }
        else{
            echo "Error!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>

<h2>Add Book</h2>

<form method="POST">

    Book ID:
    <input type="text" name="book_id" placeholder="B001" required>

    <br><br>

    Book Name:
    <input type="text" name="book_name" required>

    <br><br>

    Category:
    <select name="category">
        <option>Fiction</option>
        <option>Science</option>
        <option>IT</option>
        <option>History</option>
    </select>

    <br><br>

    <button type="submit" name="submit">Add Book</button>

</form>

</body>
</html>