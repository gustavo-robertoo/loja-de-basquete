<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ggr_basketball";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$tipo = $_POST['tipo'];
$valor = $_POST['valor'];
$imagem = $_POST['imagem'];
$descricao = $_POST['descricao'];


$sql = "INSERT INTO items (tipo, valor, imagem, descricao) VALUES ('$tipo', '$valor', '$imagem', '$descricao')";

if ($conn->query($sql) === TRUE) {
  
    header("Location: visualizar2.php");
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>