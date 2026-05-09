<?php
include 'db_config.php';

$id = $_GET['id'];

$sql = "DELETE FROM books WHERE book_id='$id'";

mysqli_query($conn, $sql);

header("Location: books.php");
?>