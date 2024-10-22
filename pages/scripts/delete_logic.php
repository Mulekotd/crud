<?php
include_once('../../includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectToDatabase();

    $record_id = $_POST["record_id"];

    $deleteQuery = "DELETE FROM public.crud WHERE id = $record_id";
    $deleteResult = pg_query($conn, $deleteQuery);

    if ($deleteResult) {
        $updateQuery = "UPDATE public.crud SET id = id - 1 WHERE id > $record_id";
        $updateResult = pg_query($conn, $updateQuery);

        if ($updateResult) {
            header('Location: ../../index.php');
            exit;
        } else {
            $error_message = "Erro ao atualizar IDs: " . pg_last_error($conn);
        }
    } else {
        $error_message = "Erro ao excluir o registro: " . pg_last_error($conn);
    }

    pg_close($conn);
}

if (isset($error_message)) {
    echo "<p>$error_message</p>";
}
?>
