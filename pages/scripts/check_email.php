<?php
include_once('../../includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectToDatabase();

    $email = $_POST["email"];
    $checkEmailQuery = "SELECT * FROM public.crud WHERE email = '$email'";
    $checkEmailResult = pg_query($conn, $checkEmailQuery);

    if (pg_num_rows($checkEmailResult) > 0) {
        $response = array("exists" => true);
    } else {
        $response = array("exists" => false);
    }

    pg_close($conn);

    echo json_encode($response);
}
?>
