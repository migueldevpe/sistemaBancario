<!-- ATÉ O MOMENTO, NÃO HÁ UTILIDADE -->

<?php 
  require_once('Transacao.php');

  class Extrato {
    private array $transacoes = [];

    public function adicionarTransacao(Transacao $t): void {
      $this->transacoes[] = $t;
    }

    public function gerarRelatorio(): string {
      $linhas = array_map(fn($t) => $t->getResumo(), $this->transacoes);
      return implode(PHP_EOL, $linhas);
    }
  }
?>