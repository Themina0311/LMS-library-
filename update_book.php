<?php
include 'db_config.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM books WHERE book_id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $book_name = $_POST['book_name'];
    $category = $_POST['category'];

    $sql = "UPDATE books
            SET book_name='$book_name',
            category='$category'
            WHERE book_id='$id'";

    mysqli_query($conn, $sql);

    header("Location: books.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
</head>
<body>

<h2>Update Book</h2>

<form method="POST">

Book Name:
<input type="text" name="book_name"
value="<?php echo $row['book_name']; ?>">

<br><br>

Category:
<input type="text" name="category"
value="<?php echo $row['category']; ?>">

<br><br>

<button name="update">Update</button>

</form>

</body>
</html>