<?php
$books = json_decode(file_get_contents('assets/books.json'), true);
require_once 'search.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Book Manager</title>
</head>

<body>
    <div class="container">
        <h1 class="display-2 text-center">Books</h1>
        <form class="input-group col-md-6 text-center" action="index.php" method="GET">
            <input class="form-control col-auto" type="text" name="search" size="32" placeholder="something" value=<?php echo (isset($_GET['search'])) ? $_GET['search'] : "" ?>>
            <input class="col-auto btn btn-primary" type="submit" value="🔍 Search">
        </form>
        <a href="assets/books.json" target="_blank">view raw JSON contents</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Available</th>
                <th>Pages</th>
                <th>ISBN</th>
            </tr>
            <form action="add-book.php" method="POST">
                <tr>
                    <td><input type="text" name="title" placeholder="Title" required></td>
                    <td><input type="text" name="author" placeholder="Author" required></td>
                    <td><input type="checkbox" name="available" checked> </td>
                    <td><input type="number" name="pages" placeholder="Pages" required></td>
                    <td><input type="number" name="isbn" placeholder="ISBN" required></td>
                    <td><input class="btn btn-success" type="submit" value="➕     Add   "></td>
                </tr>
            </form>
            <?php foreach ($books as $key => $book) : ?>
                <tr>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['available'] ? 'True' : 'False' ?></td>
                    <td><?= $book['pages'] ?></td>
                    <td><?= $book['isbn'] ?></td>
                    <td><a href="remove-book.php?id=<?php echo $key ?>" onclick="return confirm('Are you sure?');"><button class="btn btn-danger">➖ Remove</button></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>