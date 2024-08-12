<?php
session_start();
require 'config2.php';


if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
   
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        if (isset($_POST['remover'])) {
            unset($_SESSION['carrinho'][$id]);
        }

        if (isset($_POST['atualizar'])) {
            $novaQuantidade = max(0, (int)$_POST['quantidade']);
            $quantidadeAntiga = $_SESSION['carrinho'][$id] ?? 0;
            
            $diferenca = $novaQuantidade - $quantidadeAntiga;

            if ($novaQuantidade == 0) {
                unset($_SESSION['carrinho'][$id]);
            } else {
                $_SESSION['carrinho'][$id] = $novaQuantidade;
            }

            $novoEstoque = $produto['estoque'] - $diferenca;
            $stmt = $pdo->prepare("UPDATE produtos SET estoque = ? WHERE id = ?");
            $stmt->execute([$novoEstoque, $id]);
        }

        if (isset($_POST['novo_preco'])) {
            $novoPreco = (float)$_POST['novo_preco'];
            $stmt = $pdo->prepare("UPDATE produtos SET preco = ? WHERE id = ?");
            $stmt->execute([$novoPreco, $id]);
        }
    }
}

$carrinho = $_SESSION['carrinho'] ?? [];

$produtos = [];
$totalCarrinho = 0;
if (!empty($carrinho)) {
    try {
        $ids = implode(',', array_fill(0, count($carrinho), '?'));
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id IN ($ids)");
        $stmt->execute(array_keys($carrinho));
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($produtos as $produto) {
            $quantidade = $carrinho[$produto['id']];
            $preco = $produto['preco'];
            $precoTotalProduto = $preco * $quantidade;
            
            $totalCarrinho += $precoTotalProduto;
        }

       
        if (isset($_SESSION['order_id'])) {
            $orderId = $_SESSION['order_id'];
            
         
            $stmt = $pdo->prepare("UPDATE orders SET total_value = ? WHERE id = ?");
            $stmt->execute([$totalCarrinho, $orderId]);
        } else {
            
            $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_value) VALUES (?, ?)");
            $stmt->execute([$_SESSION['id'], $totalCarrinho]);
            $_SESSION['order_id'] = $pdo->lastInsertId(); 
        }

    } catch (PDOException $e) {
        die("Erro ao buscar produtos: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/carrinho.css">
    <title>Carrinho</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>

    <div class="display">
    <table>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Total</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= htmlspecialchars($produto['nome']) ?></td>
                <td><?= $carrinho[$produto['id']] ?></td>
                <td>R$<?= number_format($produto['preco'], 2, ',', '.') ?></td>
                <td>R$<?= number_format($produto['preco'] * $carrinho[$produto['id']], 2, ',', '.') ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                        <input type="number" name="quantidade" value="<?= $carrinho[$produto['id']] ?>" min="0" max="<?= $produto['estoque'] + ($carrinho[$produto['id']] ?? 0) ?>">
                        <button type="submit" name="atualizar">Atualizar</button>
                    </form>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                        <button type="submit" name="remover">Remover</button>
                    </form>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                        <input type="number" step="0.01" name="novo_preco" placeholder="Novo Preço">
                        <button type="submit">Atualizar Preço</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Total do Carrinho: R$<?= number_format($totalCarrinho, 2, ',', '.') ?></h2>
</div>
    <a href="pagina-de-compra.php">Voltar aos Produtos</a>
</body>
</html>
