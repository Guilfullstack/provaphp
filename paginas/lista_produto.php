<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="estilo/lista_produto.css">
</head>
<body>
    <?php
    require 'src/produto.service.php';

    // Cria uma instância do serviço de produto
    $produtoService = new ProdutoService();

    // Define a quantidade de produtos por página
    $quantidadePorPagina = 5;

    // Chama a função de listarProdutos()
    $dadosProdutos = $produtoService->listarProdutos($quantidadePorPagina);

    // Obtém os produtos, o total de páginas e a página atual
    $produtos = $dadosProdutos['produtos'];
    $totalPaginas = $dadosProdutos['totalPaginas'];
    $paginaAtual = $dadosProdutos['paginaAtual'];

    // Função para exibir os botões de página (limitado a 4 botões)
    function exibirBotoesPagina($paginaAtual, $totalPaginas) {
        $botoes = '';
    
        // Botão para a primeira página (somente se não estiver na primeira página)
        if ($paginaAtual > 1) {
            $botoes .= '<a href="?pagina=1" class="pagina-link">Primeira</a>';
        }
    
        // Botão para a página anterior (somente se não estiver na primeira página)
        if ($paginaAtual > 1) {
            $botoes .= '<a href="?pagina=' . ($paginaAtual - 1) . '" class="pagina-link"><</a>';
        }
    
        // Botão para a página atual
        $botoes .= '<a href="?pagina=' . $paginaAtual . '" class="pagina-link">' . $paginaAtual . '</a>';
    
        // Botão para a próxima página (somente se não estiver na última página)
        if ($paginaAtual < $totalPaginas) {
            $botoes .= '<a href="?pagina=' . ($paginaAtual + 1) . '" class="pagina-link">></a>';
        }
    
        // Botão para a última página (somente se não estiver na última página)
        if ($paginaAtual < $totalPaginas) {
            $botoes .= '<a href="?pagina=' . $totalPaginas . '" class="pagina-link">Última</a>';
        }
    
        return $botoes;
    }
    
    
    ?>

    <h1>Listagem de Produtos</h1>

    <!-- Exibe os produtos em forma de tabela -->
    <table>
        <thead>
            <tr>
                <th>codigo</th>
                <th>Nome do Produto</th>
                <th>Marca do Produto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?php echo $produto['cod_produto']; ?></td>
                    <td><?php echo $produto['nome_produto']; ?></td>
                    <td><?php echo $produto['marca_produto']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Exibe a navegação de página -->
    <div class="pagina-navegacao">
        <p>
        Páginas:
        <?php echo exibirBotoesPagina($paginaAtual, $totalPaginas); ?>
        </p>
        <form action="" method="post">
        <tr class="pagina-navegacao">
            <th><a href="alterar_prod.html">Alterar</a></th>
            <th><input type="submit" value="Alterar"></th>
            <th><input type="button" value="Remover"></th>
        </tr>
        </form>
        
    </div>
</body>
</html>
