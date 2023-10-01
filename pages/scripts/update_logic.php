<?php
include_once('../../includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectToDatabase();

    $name = strtoupper($_POST["name"]);
    $email = $_POST["email"];
    $age = $_POST["age"];
    $id = $_POST["id"];

    $query = "SELECT email FROM public.crud WHERE id = $id";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) == 1) {
        $row = pg_fetch_assoc($result);
        $existingEmail = $row["email"];

        if ($email !== $existingEmail) {
            $checkEmailQuery = "SELECT * FROM public.crud WHERE email = '$email'";
            $checkEmailResult = pg_query($conn, $checkEmailQuery);

            if (pg_num_rows($checkEmailResult) > 0) {
                echo "Erro ao atualizar o registro: Email já registrado.";
                pg_close($conn);
                exit;
            }
        }

        $updateQuery = "UPDATE public.crud 
                        SET name = '$name', age = $age, email = '$email' 
                        WHERE id = $id";

        $updateResult = pg_query($conn, $updateQuery);

        if ($updateResult) {
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar o registro: " . pg_last_error($conn);
        }
    } else {
        echo "Registro não encontrado.";
    }

    pg_close($conn);
}
?>
