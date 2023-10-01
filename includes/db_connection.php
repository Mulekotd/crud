<?php
include_once("config.php");

function connectToDatabase() {
    global $dbConfig;
    $connStr = "host={$dbConfig["host"]} port={$dbConfig["port"]} dbname={$dbConfig["dbname"]} user={$dbConfig["user"]} password={$dbConfig["password"]}";
    $conn = pg_connect($connStr);

    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . pg_last_error());
    }

    return $conn;
}
?>