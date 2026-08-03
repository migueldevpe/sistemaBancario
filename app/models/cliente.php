<?php 
  class Cliente {
    protected string $nome;
    protected string $documento;
    protected string $email;

    public function __construct(
      string $nome, 
      string $documento, 
      string $email
    ) {
      $this->nome = $nome;
      $this->documento = $documento;
      $this->email = $email;
    }

    public function setNome(string $nome): void {
      $this->nome = $nome;
    }

    public function getNome(): string {
      return $this->nome;
    }

    public function setDocumento(string $documento): void {
      $this->documento = $documento;
    }

    public function getDocumento(): string {
      return $this->documento;
    }

    public function setEmail(string $email): void {
      $this->email = $email;
    }

    public function getEmail(): string {
      return $this->email;
    }
  }
?>