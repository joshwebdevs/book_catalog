<?php
include '../conn.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $category = $_POST['category'];
    $year_published = $_POST['year_published'];

    try {
        $sql = "UPDATE books SET title=?, isbn=?, author=?, publisher=?, category=?, year_published=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $isbn, $author, $publisher, $category, $year_published, $id]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "No changes made or invalid book ID."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Invalid request method."]);
}


?>
