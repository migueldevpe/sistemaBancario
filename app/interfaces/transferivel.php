<?php 
  require_once("./app/models/contas/Conta.php");

  interface Transferivel {
    public function transferir(Conta $cliente, float $valor): void;
  }
?>