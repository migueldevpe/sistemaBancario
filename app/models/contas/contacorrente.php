<?php
  require_once('Conta.php');

  class ContaCorrente extends Conta {
    private float $limite;

    public function __construct(
      int $numero, 
      Cliente $cliente, 
      float $limite = 500.0
    ) {
      parent::__construct($numero, $cliente);
      $this->limite = $limite;
    }

    public function calcularTarifa(): float {
      return 0.0;
    }

    public function sacar(float $valor): void {
      if ($this->saldo - $valor < -$this->limite) {
        throw new Exception("Saldo insuficiente: limite excedido.");
      }
      $this->saldo -= $valor;
    }

    public function registrarAuditoria(string $acao): void {
      throw new Exception('Not implemented');
    }

    public function getTipo(): string {
      return 'Conta Corrente';
    }
  }

?>