<?php
include 'database.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE tarefas SET concluida = 1 WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
}
header("Location: index.php");
exit;
?>