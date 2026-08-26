

<?php

/*include '/..infra/connect.php';
$sql = "SELECT * FROM animais";
$result = mysqli_query($conexao, $sql);
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>AUMIGOS</title>
</head>
<body>

<header>
<nav>
<a href="public/cadastro_clientes.php">CADASTRO DE CLIENTES</a>
<br>
<a href="public/cadastro_animais.php">CADASTRO DE ANIMAIS</a>
</nav>
</header>

<main>

<h1>Tabela de animais cadastrados</h1>
        <form method="POST">
            <label for="usuario">Filtro por Usuário</label>
            <select name="cliente" id="">
                <option value="">Todos</option>

            <?php
            $sql_clientes = "SELECT * FROM clientes";
            $result_clientes = mysqli_query($conexao, $sql_clientes);
            while ($clientes = mysqli_fetch_assoc($result_clientes)) {
                echo "<option value ='{$usuario['id']}'>{$usuario['nome']}</option>";
            }
            ?>
            </select>

            <button type="submit">Filtrar</button>
            <br>
            <br>
            <form>
                <table>
                    <thead>
                        <tr>
                            <th>nome</th>
                            <th>email</th>
                            <th>numero</th>
                            <th>ID do cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                        
                            while ($animal = mysqli_fetch_assoc($result_clientes)) {

                            echo "<tr>";
                            echo "<td>{$animal['nome']}</td>";
                            echo "<td>{$animal['raça']}</td>";
                            echo "<td>{$animal['idade']}</td>";
                            echo "<td>{$animal['dono_do_animal']}</td>";
                            echo "";


                            }
                        
                            ?>                        
                        </tr>
                    </tbody>
                </table>
            </form>

</main>

<footer></footer>
    
</body>
</html>