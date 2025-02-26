<?php
require '../conn.php';

header('Content-Type: application/json'); // Ensure response is JSON

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Prevent SQL injection

    try {
        $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($book) {
            echo json_encode($book); // Send book data
        } else {
            echo json_encode(["error" => "Book not found"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "No ID provided"]);
}
?>
