<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['email'];

$sql = "SELECT nome, email, telefone, endereco, CPF, data_nascimento, cidade, estado, genero FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    $user = null;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cartão de Visita Virtual</title>
</head>
<body>
    <div class="cartao">
        <div class="grid imagem">
            <img src="mauricio.png" alt="Foto do dono">
        </div>
        <div class="informacoes">
            <h1><?php echo $user ? htmlspecialchars($user['nome']) : 'Nome não disponível'; ?></h1>
            <p><img src="gmail.png" alt="">Email: <a href="mailto:<?php echo $user ? htmlspecialchars($user['email']) : '#'; ?>"><?php echo $user ? htmlspecialchars($user['email']) : 'Email não disponível'; ?></a></p>
            <p><img src="94915.png" alt="">Telefone: <?php echo $user ? htmlspecialchars($user['telefone']) : 'Telefone não disponível'; ?></p>
            <p>Endereço: <?php echo $user ? htmlspecialchars($user['endereco']) : 'Endereço não disponível'; ?></p>
            <a href="index.php"><button class="curriculo">Voltar para a Tela de Login</button></a>
        </div>
    </div>
</body>
</html>
