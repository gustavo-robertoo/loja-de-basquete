<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="src/css/telacadastro.css" />
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site";


$conexao = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conexao, 'utf8');


if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

if (isset($_POST['submit'])) {

    $Nome = $_POST["nome"];
    $Email = $_POST["email"];
    $Senha = $_POST["senha"];
    $Telefone = $_POST["telefone"];
    $Endereco = $_POST["endereco"];
    $CPF = $_POST["CPF"];
    $Data_nascimento = $_POST["data_nascimento"];
    $Cidade = $_POST["cidade"];
    $Estado = $_POST["estado"];
    $Genero = $_POST["genero"];


    $senha_criptografada = password_hash($Senha, PASSWORD_BCRYPT);

  
    $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "O e-mail já está cadastrado. Tente outro.";
        $stmt->close();
    } else {
        $stmt = $conexao->prepare("INSERT INTO usuarios(nome, email, senha, telefone, endereco, CPF, data_nascimento, cidade, estado, genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("ssssssssss", $Nome, $Email, $senha_criptografada, $Telefone, $Endereco, $CPF, $Data_nascimento, $Cidade, $Estado, $Genero);

            if ($stmt->execute()) {
                header("Location: index11.php?cadastro=sucesso");
                exit();
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conexao->error;
        }
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="telacadastro.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Clientes</h1>
        <form action="telacadastro.php" method="POST">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>

            <label for="CPF">CPF:</label>
            <input type="text" id="CPF" name="CPF" required>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required>

            <label for="genero">Gênero:</label>
            <select id="genero" name="genero">
                <option value="">Selecione...</option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="outro">Outro</option>
            </select>   

            <button type="submit" name="submit" id="submit">Cadastrar</button> 
        </form>
    </div>
</body>
</html>
</body>
</html>