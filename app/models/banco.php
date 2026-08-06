<?php 
  require_once('./app/models/contas/Conta.php');

  class Banco {
    private array $contas = [];

    public function abrirConta(Conta $conta): void {
      $this->contas[$conta->getNumero()] = $conta;
    }

    public function transferir(
      Conta $contaOrigem, 
      Conta $contaDestino, 
      float $valor
    ): void {
      if ($contaOrigem == $contaDestino) {
        throw new Exception("Conta de origem e destino não podem ser iguais.");
      } 
      $contaOrigem->sacar($valor);
      $contaDestino->depositar($valor);
    }

    public function getContas(): array {
      return $this->contas;
    }
  }
?>