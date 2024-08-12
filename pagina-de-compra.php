<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="src/css/pagina-de-compra.css" />
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon" />
  </head>
  <body>
    <?php
session_start();
require 'config2.php';

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

try {
    $stmt = $pdo->query("SELECT * FROM loja.produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar produtos: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    $stmt = $pdo->prepare("SELECT * FROM loja.produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        $quantidadeNoCarrinho = $_SESSION['carrinho'][$id] ?? 0;
        if (isset($produto['estoque']) && $produto['estoque'] > $quantidadeNoCarrinho) {
            $_SESSION['carrinho'][$id] = $quantidadeNoCarrinho + 1;
            
            $novoEstoque = $produto['estoque'] - 1;
            $stmt = $pdo->prepare("UPDATE loja.produtos SET estoque = ? WHERE id = ?");
            $stmt->execute([$novoEstoque, $id]);
        } else {
            echo "<script>alert('Estoque insuficiente para o produto {$produto['nome']}');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="src/css/pagina-de-compra.css" />
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon" />
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
                <a href="login.html">
                    <img src="public/imgs/login.png" alt="Login Icon" class="header-icon" />
                </a>
                <a href="carrinho.php">
                    <img src="public/imgs/carrinho.png" alt="Cart Icon" class="header-icon" />
                </a>
            </div>
        </div>
    </header>

    <nav>
    <div class="inter-hb">
        
            <button class="button-hb dropdown">
              <span class="span-hb">Categoria</span>

              <!-- dropdown  -->
              <ul class="dropdown_menu dropdown_menu-1">
                <!-- itens do dropdown  -->
                <li class="dropdown_item-1 dd-input">
                  <a href="redacoes/2AII/2AII.html">2AII</a>
                </li>
                <!-- <li class="dropdown_item-2 dd-input">
                  <a href="redacoes/2BII/#">2BII</a>
                </li> -->
                <li class="dropdown_item-3 dd-input">
                  <a href="sobre.html">2AA</a>
                </li>
                <li class="dropdown_item-4 dd-input">
                  <a href="sobre.html">2BA</a>
                </li>
                <li class="dropdown_item-5 dd-input">
                  <a href="sobre.html">2AB</a>
                </li>
              </ul>
            </button>
          </div>

        <a href="index.php">Produtos</a>
        <a href="adicionar.html">Adicionar</a>
        <a href="contato.html">Contato</a>
        <a href="sobre.html">Sobre</a>
    </nav>

    <section>
        <div class="carousel-container">
            <div class="carousel-slide">
                <div class="imagem1">
                    <img src="public/imgs/camiseta.png" alt="Imagem 1" />
                </div>
                <div class="imagem2">
                    <img src="public/imgs/camiseta2.png" alt="Imagem 2" />
                </div>
                <div class="imagem3">
                    <img src="public/imgs/camiseta3.png" alt="Imagem 3" />
                </div>
            </div>
            <div class="botao">
                <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="next" onclick="moveSlide(1)">&#10095;</button>
            </div>
        </div>

        <div class="produto-info">
            <h1>Lakers Nike Boy Deluxe</h1>
            <h2>79,99R$</h2>
            <div class="tamanhos">
                <button class="size-btn" data-size="P">P</button>
                <button class="size-btn" data-size="M">M</button>
                <button class="size-btn" data-size="G">G</button>
                <button class="size-btn" data-size="GG">GG</button>
            </div>
            <div class="butao">
                <form method="post">
                    <input type="hidden" name="id" value="1"> <!-- ID do produto que será adicionado ao carrinho -->
                    <button type="submit" class="btn-carrinho">
                        <img src="public/imgs/carrinho.png" alt="" />Adicionar no Carrinho
                    </button>
                </form>
            </div>

            <h3>Descrição:</h3>

            <div class="texto">
                <h4>*Nike Boy Deluxe - Jersey de Basquete*</h4>
                <p>
                    Eleve o estilo e o desempenho em quadra com a camisa Nike Boy
                    Deluxe, uma Jersey de basquete projetada para jovens atletas.
                    Confeccionada com materiais de alta qualidade, oferece conforto
                    excepcional e durabilidade, mantendo a liberdade de movimento
                    essencial para o jogo. O design moderno e a tecnologia de ventilação
                    garantem que você permaneça fresco e seco durante o treino ou a
                    partida. Com o icônico logo da Nike e cores vibrantes, a Nike Boy
                    Deluxe combina funcionalidade e estilo, ideal para jovens que querem
                    se destacar tanto no desempenho quanto na aparência. Disponível em
                    várias tamanhos e cores, esta camisa é perfeita para jovens
                    jogadores de basquete que buscam qualidade e estilo.
                </p>
            </div>
        </div>
    </section>
    <aside></aside>

    <footer>
        <div class="footer-content">
            <a href="ajuda.html" class="help-link">AJUDA?</a>
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

    <script>
        window.va =
            window.va ||
            function () {
                (window.vaq = window.vaq || []).push(arguments);
            };
    </script>
    <script defer src="src/js/script.js"></script>
</body>
</html>
