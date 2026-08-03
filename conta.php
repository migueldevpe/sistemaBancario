<?php 
  require_once('cliente.php');

  abstract class Conta {
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

    public function getSaldo() {
      return $this->saldo;
    }
  }
?>