<?php 
  class Cliente {
    protected string $nome;
    protected string $documento;
    protected string $email;

    public function __construct(string $nome, string $documento, string $email) {
      $this->$nome = $nome;
      $this->$documento = $documento;
      $this->email = $email;
    }

    public function getNome(): string {
      return $this->nome;
    }

    public function getDocumento(): string {
      return $this->documento;
    }

  }
?>