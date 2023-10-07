<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
    <link rel="icon" href="../public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/tables.css">
</head>
<body>
    <h1>Alterar registro existente</h1>

    <table id="dataTable">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Ação</th>
        </tr>
        <?php
            include_once('../includes/db_connection.php');

            $conn = connectToDatabase();

            $sql = "SELECT * FROM public.crud ORDER BY id";
            $result = pg_query($conn, $sql);

            if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    printf(
                        '<tr>
                            <td>%s</td>
                            <td contenteditable="true">%s</td>
                            <td contenteditable="true">%s</td>
                            <td contenteditable="true">%s</td>
                            <td><button class="update-button" data-id="%s">Atualizar</button></td>
                        </tr>',
                        $row['id'],
                        $row['name'],
                        $row['email'],
                        $row['age'],
                        $row['id']
                    );
                }
            } else {
                echo '<tr><td colspan="5">Nenhum registro encontrado.</td></tr>';
            }

            pg_close($conn);
        ?>
    </table>

    <script src="../js/update.js"></script>
</body>
</html>