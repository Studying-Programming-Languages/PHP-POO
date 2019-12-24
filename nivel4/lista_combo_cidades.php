<?php

function lista_combo_cidades($id = null)
{
    $output = '';
    $dsn = "host=172.17.0.2 port=5432 dbname=livro user=postgres password=R00t";
    $conn = pg_connect($dsn);
    $query = "SELECT id, nome FROM cidade";
    $result = pg_query($conn, $query);
    if ($result) {
        while ($cidade = pg_fetch_assoc($result)) {
            $check = ($cidade['id'] == $id) ? 'selected=1' : '';
            $output .= "<option $check value='{$cidade['id']}'> {$cidade['nome']} </option>\n";
        }
    }
    pg_close($conn);
    return $output;
}
