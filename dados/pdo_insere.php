<?php

try {
    // Instancia objeto PDO, conectando no PostgreSQL
    $conn = new PDO('pgsql:dbname=livro;user=postgres;password=R00t;host=172.17.0.2');
    
    // Executa uma serie de instruções SQL
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Andre Ferreira')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'Ayrton Senna')");

    // Fecha conexão
    $conn = null;
} catch (PDOException $e) {
    print "ERROR: " . $e->getMessage() . PHP_EOL;
}
