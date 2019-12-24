<?php

$dsn = "host=172.17.0.2 port=5432 dbname=livro user=postgres password=R00t";
$conn = pg_connect($dsn);

if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
    $id = (int) $_GET['id'];
    $result = pg_query($conn, "DELETE FROM pessoa WHERE id='{$id}'");
}

$result = pg_query($conn, "SELECT * FROM pessoa ORDER BY id");
$items = '';
while ($pessoa = pg_fetch_assoc($result)) {
    $item = file_get_contents('html/item.html');
    $item = str_replace('{id}', $pessoa['id'], $item);
    $item = str_replace('{nome}', $pessoa['nome'], $item);
    $item = str_replace('{endereco}', $pessoa['endereco'], $item);
    $item = str_replace('{bairro}', $pessoa['bairro'], $item);
    $item = str_replace('{telefone}', $pessoa['telefone'], $item);
    $items .= $item;
}

$list = file_get_contents('html/list.html');
$list = str_replace('{items}', $items, $list);
print $list;
