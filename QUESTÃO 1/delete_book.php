<?php
include 'database.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM livros WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>
