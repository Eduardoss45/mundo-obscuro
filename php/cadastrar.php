<?php
include 'conectar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, login, senha) VALUES ('$nome', '$email', '$login', '$senha')";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Cadastro efetuado com sucesso! Seja bem-vindo!'); window.location.href='../index.html';</script>";
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
