<?php
// If at least one of the fields is non-empty then update data
if (!isNonEmptyFieldAvailable()) {
    // Redirect to index.php
    header(('Location: index.php'));
    die();
}

// Check if data is valid
validateData();

// Get books data
$books = json_decode(file_get_contents('assets/books.json'), true);


// Create new book array
$newBook = [
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'available' => (strtolower($_POST['available']) == 'true') ? true : false,
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

// Check if at least one of the fields is non-empty
function isNonEmptyFieldAvailable()
{
    return !(empty($_POST['title']) &&
        empty($_POST['author']) &&
        empty($_POST['available']) &&
        empty($_POST['pages']) &&
        empty($_POST['isbn']));
}

// Check if request data is valid
function validateData()
{
    // Check available field
    $available = strtolower($_POST['available']);
    if ($available != 'true' && $available != 'false') {
        echo '<h2>Invalid available type. Must be true or false.</h2>';
        echo '<h3>Given: ' . $available . '</h3>';
        echo '<a href="index.php"><button>Go Back</button></a>';
        die();
    }
}
