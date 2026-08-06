<?php 
// use app\models\contas; 
  require_once('./app/models/Cliente.php');
  require_once('./app/interfaces/Tributavel.php');
  require_once('./app/interfaces/Auditavel.php');

  abstract class Conta implements Tributavel, Auditavel {
    protected int $numero;
    protected float $saldo = 0.0;
    protected Cliente $cliente;
    protected bool $ativa = false;

    public function __construct(
      int $numero, 
      Cliente $cliente, 
    ) {
      $this->numero = $numero;
      $this->cliente = $cliente;
    }

    abstract public function getTipo(): string;

    abstract public function calcularTarifa(): float;

    abstract public function sacar(float $valor): void;

    public function depositar(float $valor): void {
      $this->saldo += $valor; 
    }

    public function getCliente(): Cliente {
      return $this->cliente;
    }

    public function getNumero(): int {
      return $this->numero;
    }

    public function getSaldo(): float {
      return $this->saldo;
    }

    public function getAtiva(): bool {
      return $this->ativa;
    }

    public function setAtiva(bool $ativa): void {
      $this->ativa = $ativa;
    }
  }
?>