<?php
include_once('../../includes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $conn = connectToDatabase();

    $id = $_GET['id'];
    $query = "SELECT name, email, age FROM public.crud WHERE id = $id";
    $result = pg_query($conn, $query);

    if ($result && pg_num_rows($result) > 0) {
        $row = pg_fetch_assoc($result);
        $recordInfo = [
            'name' => $row['name'],
            'email' => $row['email'],
            'age' => $row['age']
        ];
        echo json_encode($recordInfo);
    } else {
        echo json_encode(['error' => 'Registro não encontrado']);
    }

    pg_close($conn);
} else {
    echo json_encode(['error' => 'Requisição inválida']);
}
?>
