<!-- tipo
valor
data
contaOrigem
contaDestino -->

<?php 
  class Transacao {
    private string $tipo;
    private float $valor;
    private DateTime $data;
    private ?string $contaOrigem;
    private ?string $contaDestino;

    public function __construct(
      string $tipo,
      float $valor,
      ?string $contaOrigem,
      ?string $contaDestino
    ) {
      $this->tipo = $tipo;
      $this->valor = $valor;
      $this->data = new DateTime();
      $this->contaOrigem = $contaOrigem;
      $this->contaDestino = $contaDestino;
    }

    public function getResumo(): string {
      return sprintf("[%s] %s: R$ %.2f", $this->data->format('d/m/Y H:i'), $this->tipo, $this->valor); 
    }
  }
?>