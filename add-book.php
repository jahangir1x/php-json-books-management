<?php
// Get books data
$books = json_decode(file_get_contents('assets/books.json'), true);

// Create new book array
$newBook = [
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'available' => (strtolower($_POST['available']) == 'on') ? true : false,
    'pages' => $_POST['pages'],
    'isbn' => $_POST['isbn'],
];
$books[] = $newBook;

// Update books.json
$updatedBooksData = json_encode($books, JSON_PRETTY_PRINT);
file_put_contents('assets/books.json', $updatedBooksData);

// Redirect to index.php
header('Location: index.php');
die();
