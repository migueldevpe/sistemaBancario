<?php 
  require_once("./app/models/contas/conta.php");

  interface Transferivel {
    public function transferir(Conta $cliente, float $valor): void;
  }
?>