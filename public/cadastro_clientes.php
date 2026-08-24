<?php
include'../infra/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome_cliente = $_POST['nome'];
    $email_cliente = $_POST['email'];
    $numero_clientes = $_POST['numero'];

    $sql = 'INSERT INTO clientes (nome_cliente, email_cliente, numero_clientes) VALUES (?, ?, ?)';
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, 'sss', $nome_cliente, $email_cliente, $numero_clientes);
    
    if (mysqli_stmt_execute($stmt)) {
    echo "cliente cadastrado!";
    echo"<br><a href='../index.php'>Voltar</a>";
    mysqli_stmt_close($stmt);
    exit();
    }else{
        echo 'erro ao cadastrar'. mysqli_error( $conexao);
    }

mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<hea
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>AUMIGOS cadastro de clientes</title>
</head>
<body>

<header></header>

<main>

<form method="POST">
    <label for="nome">nome:</label>
    <input type="text" name="nome" required>
    <label for="email">email:</label>
    <input type="email" name="email" required>
    <label for="numero">numero:</label>
    <input type="number" name="numero" required>
    <button type="submit">cadastrar</button>
</form>

</main>

<footer></footer>
    
</body>
</html>