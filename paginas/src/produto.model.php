<?php

class Produto
{
  private $ID_User;
  private $nome_produto;
  private $marca_produto;

  public function __get($atributo) {
    return $this->$atributo;
  }

  public function __set($atributo, $valor) {
    $this->$atributo = $valor;
  }
}

?>