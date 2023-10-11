<?php
// Read books.json
$books = json_decode(file_get_contents('assets/books.json'), true);

// If search is set then filter books
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $books = array_filter($books, function ($book) {
        return stripos(strtolower($book['title']), strtolower($_GET['search'])) !== false ||
            stripos(strtolower($book['author']), strtolower($_GET['search'])) !== false ||
            stripos(strval($book['isbn']), strtolower($_GET['search'])) !== false;
    });
}
