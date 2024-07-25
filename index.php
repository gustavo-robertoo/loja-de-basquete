<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nba Store</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="src/css/style.css" />
  </head>
  <body>

  <?php
include_once('config.php');

if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso') {
    echo "<p>Cadastro realizado com sucesso!</p>";
}


$query = "SELECT nome, email, telefone, endereco, CPF, data_nascimento, cidade, estado, genero FROM site.usuarios ORDER BY id DESC";
$result = $conexao->query($query);

?>

<?php
include_once('config.php');
if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso') {
    echo "<p>Cadastro realizado com sucesso!</p>";
}

$query = "SELECT nome, email, telefone, endereco, CPF, data_nascimento, cidade, estado, genero FROM site.usuarios ORDER BY id DESC";
$result = $conexao->query($query);

?>

    <header>
      <img id="img1" src="public/imgs/ggr.png" alt="Logo" />
      <div class="search-container">
        <form action="/search" method="GET">
          <input type="text" placeholder="Pesquisar..." name="search" />
          <button type="submit">
            <img
              src="public/imgs/lupa.png"
              alt="Search Icon"
              class="search-icon"
            />
          </button>
        </form>
      </div>
      <div class="container">
        <div class="header-icons">
          <a href="login.html"
            ><img
              src="public/imgs/login.png"
              alt="Login Icon"
              class="header-icon"
          /></a>
          <a href="pagina-de-compra.html"
            ><img
              src="public/imgs/carrinho.png"
              alt="Cart Icon"
              class="header-icon"
          /></a>
        </div>
      </div>
    </header>

    <nav>
      <a href="index.php">Produtos</a>
      <a href="#">Adicionar</a>
      <a href="#">Contato</a>
      <a href="sobre.html">Sobre</a>
    </nav>

    <section>
      <div class="carousel-container">
        <div class="carousel-slide">
          <img src="public/imgs/carousel1.jpg" alt="Imagem 1" />
          <img src="public/imgs/carousel2.jpg" alt="Imagem 2" />
          <img src="public/imgs/carousel3.jpg" alt="Imagem 3" />
        </div>
        <div class="botao">
          <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
          <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
      </div>
      <script src="public/imgs/scripts.js"></script>

      <h1>EM DESTAQUE</h1>
      <div class="produtos">
        <div class="quadrado">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto1">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto2">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto3">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>
      </div>
      <h1>OFERTAS ESPECIAIS</h1>
      <div class="produtos2">
        <div class="quadrado2">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto4">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto5">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto6">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>
      </div>
      <h1>LANÇAMENTOS</h1>

      <div class="produtos3">
        <div class="quadrado3">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto7">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto8">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>

        <div class="produto9">
          <img src="public/imgs/camiseta.png" alt="" />
          <p>Nike Boy Deluxe Premium</p>
          <h2>79,99 R$</h2>
          <a href="pagina-de-compra.html"
            ><button class="buy-button">Comprar</button>
          </a>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-content">
        <a href="#" class="help-link">AJUDA?</a>
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

    <script src="src/js/script.js"></script>
    <script>
      window.va =
        window.va ||
        function () {
          (window.vaq = window.vaq || []).push(arguments);
        };
    </script>
    <script defer src="public/imgs//_vercel/insights/script.js"></script>
  </body>
</html>
