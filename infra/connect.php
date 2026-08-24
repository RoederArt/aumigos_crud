<?php
$host = "localhost";
$usuario = "root";
$senha = "ROOT";
$banco = "cadastro_aumigos";

$conexao = new mysqli($host, $usuario, $senha, $banco);
if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
}
?>