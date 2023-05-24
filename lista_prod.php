<?php
//require 'conexao.php';
require 'produto.service.php';

// Cria uma instância do serviço de produto
$produtoService = new ProdutoService();

// Define a quantidade de produtos por página
$quantidadePorPagina = 10;

// Verifica se o parâmetro 'pagina' foi enviado
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1; // Página padrão é a primeira
}

// Chama a função de listarProdutos() com a página atual e a quantidade por página
$dadosProdutos = $produtoService->listarProdutos($quantidadePorPagina, $pagina);

// Obtém os produtos, o total de páginas e a página atual
$produtos = $dadosProdutos['produtos'];
$totalPaginas = $dadosProdutos['totalPaginas'];
$paginaAtual = $dadosProdutos['paginaAtual'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Produtos</title>
</head>
<body>
    <h1>Listagem de Produtos</h1>

    <!-- Exibe os produtos -->
    <ul>
        <?php foreach ($produtos as $produto) : ?>
            <li><?php echo $produto['nome_produto']; ?> - <?php echo $produto['marca_produto']; ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Exibe a navegação de página -->
    <div>
        Páginas:
        <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
            <a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
