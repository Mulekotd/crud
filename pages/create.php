<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>
    <link rel="icon" href="../public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>

    <h1>Adicionar um novo registro</h1>

    <div class="create-page">
        
        <form action="/crud/pages/create.php" method="post">
            <label for="username">Nome: <input required type="text" name="name" id="name"/></label>
            <label for="email">Email: <input required type="text" name="email" id="email"/></label>
            <label for="age">Idade: <input required type="number" name="age" id="age"/></label>
            <input class="submit-button" type="submit" value="Submit">
        </form>

    </div>

    <p>
        <?php
            include_once('../includes/db_connection.php');

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $conn = connectToDatabase();

                $name = strtoupper($_POST['name']);
                $email = $_POST['email'];
                $age = $_POST['age'];

                if (empty($name) || empty($email) || empty($age)) {
                    echo "Erro ao adicionar o registro: Todos os campos são obrigatórios.";
                } else {
                    $checkEmailQuery = "SELECT * FROM public.crud WHERE email = '$email'";
                    $checkEmailResult = pg_query($conn, $checkEmailQuery);

                    if (pg_num_rows($checkEmailResult) > 0) {
                        echo "Erro ao adicionar o registro: Email já registrado.";
                    } else {
                        $sql = "INSERT INTO public.crud (name, email, age) VALUES ('$name', '$email', $age)";
                        $result = pg_query($conn, $sql);

                        if ($result) {
                            echo "Registro adicionado com sucesso!";
                            header('Location: ../index.php');
                            exit;
                        } else {
                            echo "Erro ao adicionar o registro: " . pg_last_error($conn);
                        }
                    }
                }
                pg_close($conn);
            }
        ?>
    </p>
</body>
</html>