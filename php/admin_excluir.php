<?php
include 'conectar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM usuario WHERE id=$id";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Usuário foi excluído com sucesso!'); window.location.href='../index.html';</script>";
    } else {
        echo "Erro ao excluir: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
