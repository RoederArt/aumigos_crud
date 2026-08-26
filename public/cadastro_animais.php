<?php
include '../infra/connect.php';

$sql_clientes = "SELECT * FROM clientes";
$result_clientes = mysqli_query($conexao, $sql_clientes);

if (!$result_clientes) {
    die('Erro na consulta de clientes: ' . mysqli_error($conexao));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_animal = trim($_POST['nome'] ?? '');
    $raca_animal = trim($_POST['raça'] ?? '');
    $idade_animal = $_POST['idade'] ?? '';
    $id_cliente = $_POST['dono_do_animal'] ?? '';

    if ($id_cliente === '') {
        die('Erro: selecione um cliente válido para cadastrar o animal.');
    }

    $sql_insert = "INSERT INTO animais (nome_animal, raca_animal, idade_animal, id_clientes) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql_insert);
    mysqli_stmt_bind_param($stmt, 'ssii', $nome_animal, $raca_animal, $idade_animal, $id_cliente);

    if (mysqli_stmt_execute($stmt)) {
        echo 'Animal cadastrado com sucesso!';
        echo '<br><a href="../index.php">Voltar</a>';
        exit;
    } else {
        die('Erro ao cadastrar animal: ' . mysqli_error($conexao));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUMIGOS cadastro de animais</title>
</head>
<body>

<header></header>

<main>
    <form method="POST">
        <label for="nome">nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="raça">raça:</label>
        <input type="text" name="raça" required>
        <br>
        <label for="idade">idade:</label>
        <input type="number" name="idade" required>
        <br>
        <label for="dono_do_animal">dono do animal:</label>
        <select name="dono_do_animal" id="dono_do_animal">
            <?php
            if (mysqli_num_rows($result_clientes) == 0) {
                echo '<option value="">Cadastre um cliente primeiro</option>';
            } else {
                mysqli_data_seek($result_clientes, 0);
                while ($cliente = mysqli_fetch_assoc($result_clientes)) {
                    echo "<option value='{$cliente['id']}'>{$cliente['nome_cliente']}</option>";
                }
            }
            ?>
        </select>

        <button type="submit">cadastrar</button>
    </form>
</main>

</body>
</html>
