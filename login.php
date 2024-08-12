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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT senha FROM salvos WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($senha_criptografada);
            $stmt->fetch();

            if (password_verify($senha, $senha_criptografada)) {
             
                $_SESSION['email'] = $email;
                header("Location: perfil.php"); 
                exit();
            } else {
               
                echo "Senha incorreta!";
            }
        } else {
        
            echo "Usuário não encontrado!";
        }

        $stmt->close();
    } elseif (isset($_POST['cadastro'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $senha_criptografada = password_hash($senha, PASSWORD_BCRYPT);

        $sql = "INSERT INTO salvos (email, senha) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $senha_criptografada);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tela de Login</title>
    <link rel="stylesheet" href="src/css/login.css" />
</head>
<body>
    <div class="box">
        <img id="tela" src="public/imgs/imagibaska.jpeg" alt="Imagem de fundo" />
    </div>
    <aside>
        <div class="box2">
            <h2>Login</h2>
            <form id="loginForm" action="index.php" method="post">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" placeholder="Digite aqui" required />
                <br /><br />
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite aqui" required />
                <br /><br />
                <label>
                    <input type="checkbox" id="lembrar" /> Lembrar login
                </label>
                <br /><br />
                <div class="botao">
                    <input type="submit" value="Entrar"/>
                </div>
                <input type="hidden" name="login" value="true">
                <div class="cadastro">
                    <a href="telacadastro.php">Não possui conta? Cadastre-se</a>
                </div>
            </form>
        </div>
    </aside>
    <script src="src/js/login.js"></script>
</body>
</html>


