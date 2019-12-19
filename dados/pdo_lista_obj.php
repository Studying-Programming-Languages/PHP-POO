<?php

try {
    // Instancia o objeto PDO, conectando no PostgreSQL
    $conn = new PDO("pgsql:dbname=livro;user=postgres;password=R00t;host=172.17.0.2");
    
    // Executa uma instrução SQL de consulta
    $result = $conn->query("SELECT codigo, nome FROM famosos");

    if ($result) {
        // Percorre os resultados SQL de consulta
        while ($famoso = $result->fetch(PDO::FETCH_OBJ)) {
            // Exibe os dados na tela, acessando o objeto retornado
            print $famoso->codigo . " - " . $famoso->nome . PHP_EOL;
        }
    }

    // Fecha a conexão
    $conn = null;
} catch (PDOException $e) {
    print "ERROR: " . $e->getMessage() . PHP_EOL;
}
