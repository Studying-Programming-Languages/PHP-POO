<?php

$dados = $_GET;
if (!empty($dados['id'])) {
    $dsn = "host=172.17.0.2 port=5432 dbname=livro user=postgres password=R00t";
    $conn = pg_connect($dsn);
    $sql = "DELETE FROM pessoa WHERE id = {$dados['id']}";
    $result = pg_query($conn, $sql);
    if ($result) {
        print 'Registro excluido com sucesso!';
    } else {
        print pg_last_error($conn);
    }
    pg_close($conn);
}