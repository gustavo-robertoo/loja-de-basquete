<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="src/css/adicionar.css">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product-item {
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 10px;
            padding: 20px;
            width: 100px;
            text-align: center;
        }
        .product-item img {
            max-width: 100%;
            height: auto;
        }
        .item-container {
            text-align: center;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        .item-container img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .item-container h2, .item-container p {
            margin: 10px 0;
        }
    </style>

</head>
<body>
    <header>
        <img id="img1" src="public/imgs/ggr.png" alt="Logo" />
        <div class="search-container">
            <form action="/search" method="GET">
                <input type="text" placeholder="Pesquisar..." name="search" />
                <button type="submit">
                    <img src="public/imgs/lupa.png" alt="Search Icon" class="search-icon" />
                </button>
            </form>
        </div>
        <div class="container">
            <div class="header-icons">
                <a href="login.html"><img src="public/imgs/login.png" alt="Login Icon" class="header-icon" /></a>
                <a href="carrinho.php"><img src="public/imgs/carrinho.png" alt="Cart Icon" class="header-icon" /></a>
            </div>
        </div>
    </header>
    <nav>
        
        <div class="inter-hb">
            <button class="button-hb dropdown">
              <span class="span-hb">Categoria</span>

              
              <ul class="dropdown_menu dropdown_menu-1">
                
                <li class="dropdown_item-1 dd-input">
                  <a href="index4.php">Moletom</a>
                </li>
                <!-- <li class="dropdown_item-2 dd-input">
                  <a href="redacoes/2BII/#">2BII</a>
                </li> -->
                <li class="dropdown_item-3 dd-input">
                  <a href="index3.php">Camiseta</a>
                </li>
                <li class="dropdown_item-4 dd-input">
                  <a href="index1.php">Bolas</a>
                </li>
                <li class="dropdown_item-5 dd-input">
                  <a href="index2.php">Boné</a>
                </li>
              </ul>
            </button>
          </div>


        <a href="index.php">Produtos</a>
        <a href="adicionar.html">Adicionar</a>
        <a href="contato.html">Contato</a>
        <a href="sobre.html">Sobre</a>
    </nav>
    <div class="item-container">
        <?php
      
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ggr_basketball";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM items ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<h6>Tipo: "  . $row["tipo"] . "</h6>";
                echo "<h6>Valor: " . $row["valor"]. "</h2>";
                echo "<img src='" . $row["imagem"]. "' alt='Imagem do Item'>";
                echo "<p>" . $row["descricao"]. "</p>";
            }
        } else {
            echo "<p>Nenhum item encontrado.</p>";
        }

        $conn->close();
        ?>
    </div>
    <section>
        <a href="adicionar.php">Adicionar produto</a>
        <div id="content-placeholder"></div>

    </main>
   
    </section>
    <footer>
        <a href="ajuda.html" class="help-link">AJUDA?</a>
        <div class="footer-content">
            <h2>FORMAS DE PAGAMENTO</h2>
            <div class="payment-methods">
                <img src="public/imgs/boleto.png" alt="Boleto" />
                <img src="public/imgs/elo.png" alt="Elo" />
                <img src="public/imgs/mastercard.png" alt="Mastercard" />
                <img src="public/imgs/visa.png" alt="Visa" />
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; Todos os direitos reservados à GGR Basketball e pela NBA</p>
        </div>
    </footer>

</body>
</html>
