<?php
$books = json_decode(file_get_contents('assets/books.json'), true);
require_once 'search.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Manager</title>
</head>

<body>
    <h1>Books</h1>
    <form action="index.php" method="GET">
        <input type="text" name="search" placeholder="One Hundred Years Of Solitude" value=<?= $_GET['search'] ?>>
        <input type="submit" value="🔍 Search">
    </form>
    <table border="3">
        <tr>
            <th>
                Title
            </th>
            <th>
                Author
            </th>
            <th>
                Available
            </th>
            <th>
                Pages
            </th>
            <th>
                ISBN
            </th>
        </tr>
        <?php foreach ($books as $key => $book) : ?>
            <tr>
                <td>
                    <?= $book['title'] ?>
                </td>
                <td>
                    <?= $book['author'] ?>
                </td>
                <td>
                    <?= $book['available'] ? 'True' : 'False' ?>
                </td>
                <td>
                    <?= $book['pages'] ?>
                </td>
                <td>
                    <?= $book['isbn'] ?>
                </td>
                <td>
                    <a href="remove-book.php?id=<?php echo $key ?>"><button>➖ Remove</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <form action="add-book.php" method="POST">
            <tr>
                <td>
                    <input type="text" name="title" placeholder="Title">
                </td>
                <td>
                    <input type="text" name="author" placeholder="Author">
                </td>
                <td>
                    <input type="text" name="available" placeholder="Language">
                </td>
                <td>
                    <input type="text" name="pages" placeholder="Pages">
                </td>
                <td>
                    <input type="text" name="isbn" placeholder="Year">
                </td>
                <td>
                    <input type="submit" value="➕     Add   ">
                </td>
            </tr>
    </table>
    <br>
    <br>
    <br>
    <a href="assets/books.json">view raw JSON contents</a>
</body>

</html>