<?php
    require_once 'paginas/src/produto.service.php';

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário
        $id = $_POST['cod_prodtuto'];
        $novoNome = $_POST['nome_produto'];
        $novaMarca = $_POST['marca_produto'];

        // Cria uma instância do serviço de produto
        $produtoService = new ProdutoService();

        // Chama a função de alterarProduto()
        if ($produtoService->alterarProduto($id, $novoNome, $novaMarca)) {
            echo "Produto alterado com sucesso!";
        } else {
            echo "Erro ao alterar o produto.";
        }
    }
    ?>