<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Livraria</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color:rgb(255, 255, 255); }
        h1 { color: #333; }
        form { margin-bottom: 20px; }
        input { padding: 8px; margin: 5px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background-color: #ddd; }
        a { color: red; }
    </style>
</head>
<body>
    <h1>Cadastro de Livros</h1>

    <form method="post" action="add_book.php">
        <input type="text" name="titulo" placeholder="Título do livro" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <input type="number" name="ano" placeholder="Ano" required>
        <input type="submit" value="Cadastrar">
    </form>

    <h2>Lista de Livros</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Ação</th>
        </tr>
        <?php
        $resultado = $db->query("SELECT * FROM livros");
        foreach ($resultado as $livro) {
            echo "<tr>";
            echo "<td>{$livro['id']}</td>";
            echo "<td>{$livro['titulo']}</td>";
            echo "<td>{$livro['autor']}</td>";
            echo "<td>{$livro['ano']}</td>";
            echo "<td><a href='delete_book.php?id={$livro['id']}'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
