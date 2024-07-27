<?php

if (isset($_POST['submit'])) {
    include_once('config3.php');

$id = $_POST["id"];
$nome = $_POST["nome"];
$category = $_POST["category"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$total = $_POST["total"];
$subtotal = $_POST["subtotal"];

  
    $stmt = $conexao->prepare("INSERT INTO carrinho.compras(id, nome, category, qty, price, total, subtotal) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("issiddd", $id, $nome, $category, $qty, $prince, $total, $subtotal);
        $stmt->execute();
        $stmt->close();
    } else {

        echo "Error preparing statement: " . $conexao->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="styles1.css" />
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet" />
</head>
<body>
<header>
    <span>Carrinho de compras do <b>GGR</b></span>
</header>
<main>
    <div class="page-title">Seu Carrinho</div>
    <div class="content">    
        <section>
            <table>
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>-</th>
                </tr>
                </thead>
                <tbody>
                <tr data-id="">
                    <td>
                        <div class="product">
                            <img src="camiseta3.php" alt=""/>
                            <div class="info">
                                <div class="nome">Nome do produto</div>
                                <div class="category">Categoria</div>
                            </div>
                        </div>
                    </td>
                    <td class="price">R$ 120</td>
                    <td>
                        <div class="qty"> 
                            <button class="qty-minus"><i class="bx bx-minus"></i></button>
                            <span class="qty-value">2</span>
                            <button class="qty-plus"><i class="bx bx-plus"></i></button>
                        </div>
                    </td>
                    <td class="total">R$ 240</td>
                    <td>
                        <button class="remove"><i class="bx bx-x"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
        <aside>
            <form action="carrinho.php" method="POST">
                <div class="box">
                    <header>Resumo da compra</header>
                    <div class="info">
                        <div><span>Sub-total</span><span class="subtotal">R$ 240</span></div>
                        <div><span>Frete</span><span>Gratuito</span></div>
                        <div>
                            <button type="button">
                                Adicionar cupom de desconto
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                    <footer>
                        <span>Total</span>
                        <span class="total-value">R$ 240</span>
                    </footer>
                </div>
                <input type="hidden" name="id" value="1" />
                <input type="hidden" name="nome" value="Nome do produto" />
                <input type="hidden" name="category" value="Categoria" />
                <input type="hidden" name="qty" value="2" />
                <input type="hidden" name="price" value="120" />
                <input type="hidden" name="total" value="240" />
                <input type="hidden" name="subtotal" value="240" />
                <button type="submit" name="submit" id="submit">Finalizar Compra</button>
            </form>
        </aside>  
    </div>
</main>
<script src="carrinho.js"></script>
</body>
</html>
