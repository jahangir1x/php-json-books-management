<?php
// If id is set then remove book from file.
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $books = json_decode(file_get_contents('books.json'), true);

    // Remove book from array
    unset($books[$id]);
    $updatedBooksData = json_encode($books, JSON_PRETTY_PRINT);

    // Update books.json
    file_put_contents('books.json', $updatedBooksData);

    // Redirect to book-manager.php
    header('Location: book-manager.php');
}
