<?php
include 'db_config.php';

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>

<h2>Book List</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Book ID</th>
    <th>Book Name</th>
    <th>Category</th>
    <th>Actions</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>
    <td><?php echo $row['book_id']; ?></td>
    <td><?php echo $row['book_name']; ?></td>
    <td><?php echo $row['category']; ?></td>

    <td>
        <a href="update_book.php?id=<?php echo $row['book_id']; ?>">
            Edit
        </a>

        |

        <a href="delete_book.php?id=<?php echo $row['book_id']; ?>">
            Delete
        </a>
    </td>
</tr>

<?php
}
?>

</table>

</body>
</html>