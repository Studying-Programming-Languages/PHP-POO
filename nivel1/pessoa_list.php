<html>
    <head>
        <meta charset="utf-8">
        <title>Listagem de Pessoas</title>
        <link href="css/list.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <?php 
            $dsn = "host=172.17.0.2 port=5432 dbname=livro user=postgres password=R00t";
            $conn = pg_connect($dsn);
            $result = pg_query($conn, "SELECT * FROM pessoa ORDER BY id");

            print "<table border=0>";
            print "<thead>";
            print "<tr>";
            print "<th> </th>";
            print "<th> </th>";
            print "<th> Id </th>";
            print "<th> Nome </th>";
            print "<th> Endereço </th>";
            print "<th> Bairro </th>";
            print "<th> Telefone </th>";
            print "</tr>";
            print "<tbody>";

            while ($row = pg_fetch_assoc($result)) {
                $id = $row['id'];
                $nome = $row['nome'];
                $endereco = $row['endereco'];
                $bairro = $row['bairro'];
                $telefone = $row['telefone'];
                $email = $row['email'];
                $id_cidade = $row['id_cidade'];

                print "<tr>";
                print "<td align='center'>
                    <a href='pessoa_form_edit.php?id={$id}'>
                        <img src='images/edit.png' style='width: 17px'>
                    </a>
                    </td>";
                print "<td align='center'>
                    <a href='pessoa_delete.php?id={$id}'>
                    <img src='images/remove.png' style='width: 17px'>
                    </a></td>";
                print "<td> {$id} </td>";
                print "<td> {$nome} </td>";
                print "<td> {$endereco} </td>";
                print "<td> {$bairro} </td>";
                print "<td> {$telefone} </td>";
                print "</tr>";
            }
            print "</tbody>";
            print "</table>";
        ?>
        <button onclick="window.location='pessoa_form_insert.php'">
            <img src='images/insert.png' style='width: 17px'> Inserir
        </button>
    </body>
</html>