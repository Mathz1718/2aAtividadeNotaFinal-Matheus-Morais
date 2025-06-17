<?php
include 'database.php';

if (!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['ano'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];

    $sql = "INSERT INTO livros (titulo, autor, ano) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$titulo, $autor, $ano]);
}

header("Location: index.php");
exit;
?>
