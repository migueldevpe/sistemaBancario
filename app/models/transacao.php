<?php 
  class Transacao {
    private string $tipo;
    private float $valor;
    private DateTime $data;

    public function __construct(
      string $tipo,
      float $valor,
    ) {
      $this->tipo = $tipo;
      $this->valor = $valor;
      $this->data = new DateTime();
    }

    public function getResumo(): string {
      return sprintf("[%s] %s: R$ %.2f", $this->data->format('d/m/Y H:i'), $this->tipo, $this->valor); 
    }
  }
?>