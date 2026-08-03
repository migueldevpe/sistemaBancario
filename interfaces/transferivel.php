<?php 
  require_once("conta,php");

  interface Transferivel {
    public function transferir(Conta $cliente, float $valor): void;
  }
?>