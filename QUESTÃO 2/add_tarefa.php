<?php
include 'database.php';
if (!empty($_POST['descricao']) && !empty($_POST['data'])) {
    $desc = $_POST['descricao'];
    $data = $_POST['data'];
    $sql = "INSERT INTO tarefas (descricao, data_vencimento) VALUES (?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$desc, $data]);
}
header("Location: index.php");
exit;
?>