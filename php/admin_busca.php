<?php
include 'conectar.php';

if (isset($_POST['buscar'])) {
    $email = $_POST['email'];

    // Usar prepared statements para evitar injeção de SQL
    $stmt = mysqli_prepare($conexao, "SELECT * FROM usuario WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
?>

        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="../pages/css/style.css" />
            <title>Medo do Escuro</title>
        </head>

        <body>
            <div class="container-painel">
                <form action="admin_editar.php" method="POST">
                    <h1>Alterar Perfil</h1>
                    <div><input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>" placeholder="Digite o id"></div>
                    <div><input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required placeholder="Digite o novo nome"></div>
                    <div><input type="text" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" readonly placeholder="Digite o novo email"></div>
                    <div><input type="text" name="login" value="<?php echo htmlspecialchars($usuario['login']); ?>" required placeholder="Digite o novo login"></div>
                    <div><input type="text" name="senha" placeholder="Digite a nova senha"></div>
                    <input type="submit" value="Salvar Alterações" placeholder="">
                </form>
                <div class="container-painel">
                    <form
                        class="painel-formulario"
                        ]name="dados"
                        action="excluir.php"
                        method="POST">
                        <h1>Deletar Perfil</h1>
                        <div>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                placeholder="Digite o seu email" />
                        </div>

                        <input
                            type="submit"
                            name="pesquisar"
                            title="pesquisar"
                            value="Pesquisar" />

                        <div>
                            <a href="../site/index.html">Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </body>

        </html>


<?php
    } else {
        echo "<script>alert('Desculpe, usuário não encontrado. Por favor, verifique as informações e tente novamente.'); window.location.href='../index.html';</script>";
    }


    mysqli_close($conexao);
}
?>