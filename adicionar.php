<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Adicionar Item</h2>
        <form action="salvar_item.php" method="post">

           <label for="tipo">Tipo do produto:</label>
           <select id="tipo" name="tipo">
             <option value="Moletom">Moletom</option>
             <option value="Camiseta">Camiseta</option>
             <option value="Bola">Bola</option>
             <option value="Boné">Boné</option>
            </select>
               <br>
               <br>
            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor" required>
            
            <label for="imagem">URL da Imagem:</label>
            <input type="text" id="imagem" name="imagem" required>
            
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>
            
            <input type="submit" value="Adicionar Item">
        </form>
    </div>
</body>
</html>