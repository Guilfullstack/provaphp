<?php

require 'conexao.php';
class ProdutoService {

	private $conexao;

	public function __construct() {
		$this->conexao = new Conexao();
	}

	public function Salvar(Produto $produto)
{
    // Verificar se o produto já existe
    $queryVerificar = "SELECT COUNT(*) as total FROM tb_produtos WHERE nome_produto = :nome_produto AND marca_produto = :marca_produto";
    $stmtVerificar = $this->conexao->Conectar()->prepare($queryVerificar);
    $stmtVerificar->bindValue(':nome_produto', $produto->__get('nome_produto'));
    $stmtVerificar->bindValue(':marca_produto', $produto->__get('marca_produto'));
    $stmtVerificar->execute();

    $resultadoVerificar = $stmtVerificar->fetch(PDO::FETCH_ASSOC);

    if ($resultadoVerificar['total'] > 0) {
        // O produto já está em uso, pode tomar alguma ação, como exibir uma mensagem de erro.
        echo "O produto já está em uso.";
        return; // Ou lança uma exceção, dependendo do fluxo do seu código.
    }

    // O email não existe, pode salvar o novo usuário.
    $querySalvar = "INSERT INTO tb_produtos (nome_produto, marca_produto) VALUES (:nome_produto, :nome_produto)";
    $stmtSalvar = $this->conexao->Conectar()->prepare($querySalvar);
    $stmtSalvar->bindValue(':nome_produto', $produto->__get('nome_produto')); 
    $stmtSalvar->bindValue(':marca_produto', $produto->__get('marca_produto')); 
    $stmtSalvar->execute();
}


  public function autenticar($nome_produto, $marca_produto)
{
  $query = "SELECT * FROM tb_produtos WHERE nome_produto = :nome_produto AND marca_produto = :marca_produto";
  $stmt = $this->conexao->Conectar()->prepare($query);
  $stmt->bindValue(':nome_produto', $nome_produto);
  $stmt->bindValue(':marca_produto', $marca_produto);
  $stmt->execute();

  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($resultado) {
    return true;
    // $usuario = new Usuario();
    // $usuario->__set('ID_User', $resultado['ID_User']);
    // $usuario->__set('nome', $resultado['nome']);
    // $usuario->__set('sobrenome', $resultado['sobrenome']);
    // $usuario->__set('email', $resultado['email']);
    // $usuario->__set('senha', $resultado['senha']);

    // return $usuario;
  }

  return null;
}

}

?>