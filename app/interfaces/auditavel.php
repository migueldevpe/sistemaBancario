<?php 
  interface Auditavel {
    public function registrarAuditoria(string $acao): void;
  }
?>