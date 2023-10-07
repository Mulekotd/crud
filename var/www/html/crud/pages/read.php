<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ler</title>
    <link rel="icon" href="../public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/tables.css">
</head>
<body>
    <h1>Visualizar registros adicionados</h1>

    <div class="search-bar-container">
        <input class="search-bar" type="text" id="searchInput" placeholder="Pesquisar por nome" onkeyup="searchTable()">
    </div>

    <table id="dataTable">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
        </tr>
        <?php
            include_once('../includes/db_connection.php');

            $conn = connectToDatabase();

            $sql = "SELECT * FROM public.crud ORDER BY id"; // Adicionando ORDER BY id
            $result = pg_query($conn, $sql);

            if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['age'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">Nenhum registro encontrado.</td></tr>';
            }

            pg_close($conn);
        ?>
    </table>

    <script src="../js/search.js"></script>
</body>
</html>