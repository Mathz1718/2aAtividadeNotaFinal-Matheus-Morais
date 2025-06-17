<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Tarefas</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f9f9f9; }
        h1, h2 { color: #333; }
        form, table { margin-bottom: 20px; }
        input, button { padding: 8px; margin: 5px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form method="POST" action="add_tarefa.php">
        <input type="text" name="descricao" placeholder="Descrição da tarefa" required>
        <input type="date" name="data" required>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Tarefas Pendentes</h2>
    <table>
        <tr><th>ID</th><th>Descrição</th><th>Data</th><th>Ações</th></tr>
        <?php
        $pendentes = $db->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY data_vencimento ASC");
        foreach ($pendentes as $tarefa) {
            echo "<tr>
                    <td>{$tarefa['id']}</td>
                    <td>{$tarefa['descricao']}</td>
                    <td>{$tarefa['data_vencimento']}</td>
                    <td>
                        <a href='update_tarefa.php?id={$tarefa['id']}'>Concluir</a> |
                        <a href='delete_tarefa.php?id={$tarefa['id']}'>Excluir</a>
                    </td>
                </tr>";
        }
        ?>
    </table>

    <h2>Tarefas Concluídas</h2>
    <table>
        <tr><th>ID</th><th>Descrição</th><th>Data</th><th>Ação</th></tr>
        <?php
        $concluidas = $db->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY data_vencimento ASC");
        foreach ($concluidas as $tarefa) {
            echo "<tr>
                    <td>{$tarefa['id']}</td>
                    <td>{$tarefa['descricao']}</td>
                    <td>{$tarefa['data_vencimento']}</td>
                    <td><a href='delete_tarefa.php?id={$tarefa['id']}'>Excluir</a></td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>