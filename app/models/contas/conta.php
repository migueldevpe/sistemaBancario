<?php 
  require_once('./app/models/cliente.php');
  require_once('./app/interfaces/tributavel.php');
  require_once('./app/interfaces/auditavel.php');

  abstract class Conta implements Tributavel, Auditavel {
    protected int $numero;
    protected float $saldo;
    protected ?Cliente $cliente;
    protected bool $ativa;

    public function __construct(
      int $numero, 
      Cliente $cliente, 
    ) {
      $this->numero = $numero;
      $this->cliente = $cliente;
    }

    abstract public function calcularTarifa(): float;

    abstract public function sacar(float $valor): void;

    public function depositar(float $valor): void {
      $this->saldo += $valor; 
    }

    public function getNumero(): int {
      return $this->numero;
    }

    public function getSaldo(): float {
      return $this->saldo;
    }
  }
?>