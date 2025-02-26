<?php
include '../conn.php';


$response = ["success" => false];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    try {
        $id = intval($_POST["id"]);
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $response["success"] = true;
        } else {
            $response["error"] = "Failed to delete book.";
        }
    } catch (PDOException $e) {
        $response["error"] = "Error: " . $e->getMessage();
    }
}

header("Content-Type: application/json");
echo json_encode($response);
?>
