<?php

	require "produto.model.php";
	require "produto.service.php";

	//teste para utilizar na aula
  // echo '<pre>';
  //   print_r($_POST);
  // echo '</pre>';

	$cadastro = new Produto();
	$cadastro->__set('nome_produto', $_POST['nome_produto']);
	$cadastro->__set('marca_produto', $_POST['marca_produto']);

	$cadastroService = new ProdutoService();
	$cadastroService->Salvar($cadastro);
	header('Location', 'cadastro.html');
	
?>