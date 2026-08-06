<?php 
  require_once('Conta.php');

  class ContaPoupanca extends Conta {
    public function calcularTarifa(): float {
      return 0.0;
    }

    public function sacar(float $valor): void {
      if ($this->saldo - $valor < 0) {
        throw new Exception('Saldo insuficiente.');
      }
      $this->saldo -= $valor;
    }

    public function aplicarRendimento(float $taxaMensal): void {
      $this->saldo = $this->saldo * $taxaMensal;
    }

    public function registrarAuditoria(string $acao): void {
      //
    }

    public function getTipo(): string {
      return 'Conta Poupança';
    }
  }
?>