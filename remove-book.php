<?php
// If id is set then remove book from file.
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $books = json_decode(file_get_contents('assets/books.json'), true);

    // Remove book from array
    unset($books[$id]);
    $updatedBooksData = json_encode($books, JSON_PRETTY_PRINT);

    // Update books.json
    file_put_contents('assets/books.json', $updatedBooksData);

    // Redirect to index.php
    header('Location: index.php');
}
