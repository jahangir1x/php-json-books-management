<?php
// If at least one of the fields is non-empty then update data
if (
    $_POST['author'] == "" &&
    $_POST['language'] == "" &&
    $_POST['pages'] == "" &&
    $_POST['title'] == "" &&
    $_POST['year'] == ""
) {
    // Redirect to book-manager.php
    header(('Location: book-manager.php'));
} else {
    $books = json_decode(file_get_contents('books.json'), true);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Create new book array
        $newBook = [
            'author' => $_POST['author'],
            'language' => $_POST['language'],
            'pages' => $_POST['pages'],
            'title' => $_POST['title'],
            'year' => $_POST['year'],
        ];
        $books[] = $newBook;

        // Update books.json
        $updatedBooksData = json_encode($books, JSON_PRETTY_PRINT);
        file_put_contents('books.json', $updatedBooksData);

        // Redirect to book-manager.php
        header('Location: book-manager.php');
    }
}
