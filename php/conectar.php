<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conexao = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}
