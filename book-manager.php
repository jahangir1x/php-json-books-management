<?php
$books = json_decode(file_get_contents('books.json'), true);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Manager</title>
</head>

<body>
    <h1>Books</h1>
    <table border="3">
        <tr>
            <th>
                Title
            </th>
            <th>
                Author
            </th>
            <th>
                Language
            </th>
            <th>
                Pages
            </th>
            <th>
                Year
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
                    <?= $book['language'] ?>
                </td>
                <td>
                    <?= $book['pages'] ?>
                </td>
                <td>
                    <?= $book['year'] ?>
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
                    <input type="text" name="language" placeholder="Language">
                </td>
                <td>
                    <input type="text" name="pages" placeholder="Pages">
                </td>
                <td>
                    <input type="text" name="year" placeholder="Year">
                </td>
                <td>
                    <input type="submit" value="➕     Add   ">
                </td>
            </tr>
    </table>
</body>

</html>