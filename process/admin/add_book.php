<?php
include '../conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $isbn = trim($_POST["isbn"]);
    $author = trim($_POST["author"]);
    $publisher = trim($_POST["publisher"]);
    $category = trim($_POST["category"]);
    $year_published = trim($_POST["year_published"]);

    // Check if the book already exists
    $stmt = $conn->prepare("SELECT * FROM books WHERE title = ? AND author = ?");
    $stmt->execute([$title, $author]);

    if ($stmt->rowCount() > 0) {
        echo "exists"; 
        exit;
    }

    // Insert new book
    $stmt = $conn->prepare("INSERT INTO books (title, isbn, author, publisher, category, year_published) VALUES (?, ?, ?, ?, ?, ?)");
    
    if ($stmt->execute([$title, $isbn, $author, $publisher, $category, $year_published])) {
        echo "success"; 
    } else {
        echo "error";
    }
}

?>
