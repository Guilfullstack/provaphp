
<?php
    require_once 'pagina/src/produto.service.php';

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário
        $id = $_POST['cod_produto'];
       // $novoNome = $_POST['novoNome'];
        //$novaMarca = $_POST['novaMarca'];

        // Cria uma instância do serviço de produto
        $produtoService = new ProdutoService();

        // Chama a função de alterarProduto()
        if ($produtoService->removerProduto($cod_produto)) {
            echo "Produto remover com sucesso!";
        } else {
            echo "Erro ao remover o produto.";
        }
    }
    ?>