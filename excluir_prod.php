<!-- excluir_prod.php -->

<?php
require 'paginas/src/produto.service.php';

if (isset($_GET['cod_produto'])) {
    $cod_produto = $_GET['cod_produto'];

    // Cria uma instância do serviço de produto
    $produtoService = new ProdutoService();

    // Chama o método para remover o produto
    $removido = $produtoService->removerProduto($cod_produto);

    if ($removido) {
        header("Location: paginas/lista_produto.php");
    } else {
        echo "Falha ao remover o produto.";
    }
}
?>
