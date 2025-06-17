<?php
$db = new PDO('sqlite:tarefas.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec("CREATE TABLE IF NOT EXISTS tarefas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    descricao TEXT,
    data_vencimento TEXT,
    concluida INTEGER DEFAULT 0
)");
?>