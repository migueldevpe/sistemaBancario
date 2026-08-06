<?php 
  require_once('Conta.php');

  class ContaEmpresarial extends Conta {
    private float $limite;

    public function __construct(int $numero, Cliente $cliente, float $limite = 5000.0) {
      parent::__construct($numero, $cliente);
      $this->limite = $limite;
    }

    public function calcularTarifa(): float {
      return 15.0;
    }

    public function sacar(float $valor): void {
      $valorComTarifa = $valor + $this->calcularTarifa();
      if ($this->saldo - $valorComTarifa < -$this->limite) {
        throw new Exception("Saldo insuficiente: Limite excedido.");
      }
      $this->saldo -= $valorComTarifa;
    }

    public function registrarAuditoria(string $acao): void {

    }

    public function getTipo(): string {
      return 'Conta Empresarial';
    }
  }
?>