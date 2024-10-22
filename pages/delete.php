<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
    <link rel="icon" href="../public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/tables.css">
</head>
<body>
    <h1>Excluir um registro</h1>

    <form action="scripts/delete_logic.php" method="post">
        <label for="record_id">Selecione o registro a ser excluído:</label>
        <select name="record_id" id="record_id">
            <?php
            include_once('../includes/db_connection.php');

            $conn = connectToDatabase();

            $sql = "SELECT id FROM public.crud";
            $result = pg_query($conn, $sql);

            if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                }
            } else {
                echo '<option value="">Nenhum registro disponível</option>';
            }

            pg_close($conn);
            ?>
        </select>

        <input type="submit" value="Excluir" onclick="showConfirmationModal(event)" required <?php echo (pg_num_rows($result) == 0) ? 'disabled' : ''; ?>>
    </form>

    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Confirmar Exclusão</h2>

            <div id="recordDetails" class="informations">
                <p><strong>Nome:</strong> <span id="recordName"></span></p>
                <p><strong>Email:</strong> <span id="recordEmail"></span></p>
                <p><strong>Idade:</strong> <span id="recordAge"></span></p>
            </div>
            
            <button id="confirmDelete">Confirmar Exclusão</button>
        </div>
    </div>

    <script src="../js/delete.js"></script>
</body>
</html>
