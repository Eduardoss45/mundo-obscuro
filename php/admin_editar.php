<?php
include 'conectar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : null;

    if ($senha) {
        $sql = "UPDATE usuario SET nome='$nome', login='$login', senha='$senha' WHERE id=$id";
    } else {
        $sql = "UPDATE usuario SET nome='$nome', login='$login' WHERE id=$id";
    }

    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Dados do usuário atualizados com sucesso!'); window.location.href='../pages/login.html';</script>";
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
