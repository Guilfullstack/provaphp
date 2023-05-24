<?php
    require_once 'pagina/src/produto.service.php';

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $novoNome = $_POST['novoNome'];
        $novaMarca = $_POST['novaMarca'];

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