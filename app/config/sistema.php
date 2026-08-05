<?php
  require_once('./app/models/Cliente.php');
  require_once('./app/models/contas/ContaCorrente.php');
  require_once('./app/models/contas/ContaPoupanca.php');
  require_once('./app/models/contas/ContaEmpresarial.php');

  session_start();

  if (!isset($_SESSION['clientes'])) {
    $_SESSION['clientes'] = [];
  }

  if (!isset($_SESSION['banco'])) {
    $_SESSION['banco'] = [];
  }

  if (isset($_GET['deletar'])) {
    if (count($_SESSION['clientes']) >= 1) {
      $_SESSION['clientes'] = [];
      $_SESSION['banco'] = [];

      $_SESSION['toast'] = [
        'tipo' => 'success',
        'mensagem' => 'Limpeza feita com sucesso.'
      ];
    } else {
      $_SESSION['toast'] = [
        'tipo' => 'error',
        'mensagem' => 'Já está limpo.'
      ];
    }

    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
    exit;
  }

  if (isset($_GET['deletarAberta'])) {
    if (count($_SESSION['banco']) >= 1) {
      $_SESSION['banco'] = [];

      $_SESSION['toast'] = [
        'tipo' => 'success',
        'mensagem' => 'Limpeza realizada com sucesso.'
      ];
    } else {
      $_SESSION['toast'] = [
        'tipo' => 'error',
        'mensagem' => 'Já está limpo.'
      ];
    }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_POST['acao'] ?? '') === 'cadastrar') {
      $nome = $_POST['nome'] ?? '';
      $doc = $_POST['doc'] ?? '';
      $email = $_POST['email'] ?? '';

      $existe = false;

      foreach (($_SESSION['clientes'] ?? []) as $cliente) {
        if (
            $cliente->getNome() === $nome ||
            $cliente->getDocumento() === $doc ||
            $cliente->getEmail() === $email
          ) {
          $existe = true;

          $_SESSION['toast'] = [
            'tipo' => 'error',
            'mensagem' => 'Cliente já consta como cadastrado.'
          ];

          header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
          exit;
        }
      }

      if (
        (
          !empty($_POST['nome']) && 
          !empty($_POST['doc']) && 
          !empty($_POST['email'])
        ) &&
        !$existe
      ) {
        $_SESSION['clientes'][] = new Cliente(
          $nome, 
          $doc, 
          $email
        );
      }

      $_SESSION['toast'] = [
        'tipo' => 'success',
        'mensagem' => 'Cliente cadastrado com sucesso.'
      ];

      header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
      exit;
    }

    if (($_POST['acao'] ?? '') === 'abrir_conta') {
      $email = $_POST['email'] ?? '';

      $clienteEncontrado = null;

      foreach (($_SESSION['clientes'] ?? []) as $cliente) {
        if (
          $email === $cliente->getEmail()
        ) {
          $clienteEncontrado = $cliente;
          break;
        }
      }

      $contaAtiva = false;

      foreach (($_SESSION['banco'] ?? []) as $conta) {
        if ($conta->getCliente()->getEmail() === $cliente->getEmail()) {
          if ($conta->getAtiva() === true) {
            $contaAtiva = true;
            break;
          }
        }
      }

      if (
        $clienteEncontrado && 
        !$contaAtiva
      ) {
        $tipo = $_POST['tipo'] ?? '';
        $numero = rand(10000, 99999); 

        switch ($tipo) {

          case 'corrente':
            $conta = new ContaCorrente(
              $numero,
              $clienteEncontrado
            );
            break;

          case 'poupanca':
            $conta = new ContaPoupanca(
              $numero,
              $clienteEncontrado
            );
            break;

          case 'empresarial':
            $conta = new ContaEmpresarial(
              $numero,
              $clienteEncontrado
            );
            break;

          default:
            $_SESSION['toast'] = [
              'tipo' => 'error',
              'mensagem' => 'Erro inesperado.'
            ];
            throw new Exception('Tipo de conta inválido.');
            
        }

        $conta->setAtiva(true);
            
        $clienteEncontrado->setConta($conta);

        $_SESSION['banco'][] = $conta;

        $_SESSION['toast'] = [
          'tipo' => 'success',
          'mensagem' => 'Conta ativada com sucesso.'
        ];
      } else {
        if ($contaAtiva == false) {
          $_SESSION['toast'] = [
            'tipo' => 'error',
            'mensagem' => 'Conta não criada.'
          ];
        } else {
          $_SESSION['toast'] = [
            'tipo' => 'error',
            'mensagem' => 'Conta já ativa.'
          ];
        }
      }

      header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
      exit;
    }
  }

  if (($_POST['acao'] ?? '') === 'depositar') {
    $numeroConta = $_POST['numConta'] ?? '';
    $valor = $_POST['valorDeposito'] ?? '';

    $contaEncontrada = false;

    foreach (($_SESSION['banco'] ?? []) as $conta) {
      if ($conta->getNumero() === (int) $numeroConta) {
        $contaEncontrada = true;

        if ($conta->getAtiva()) {
          if ((float) $valor > 0) {
            $conta->depositar((float) $valor);

            $_SESSION['toast'] = [
              'tipo' => 'success',
              'mensagem' => 'Depósito realizado com sucesso.'
            ];
          } else {
            $_SESSION['toast'] = [
              'tipo' => 'error',
              'mensagem' => 'Valor inválido.'
            ];
          }

          break;
        } else {
          $_SESSION['toast'] = [
            'tipo' => 'error',
            'mensagem' => 'Conta não está ativa.'
          ];

          break;
        }
      }
      
      if (!$contaEncontrada) {
        $_SESSION['toast'] = [
          'tipo' => 'error',
          'mensagem' => 'Conta não encontrada.'
        ];
      }

      header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
      exit;
    }
  }

  if (($_POST['acao'] ?? '') === 'sacar') {
    $numeroConta = $_POST['numContaSaq'] ?? '';
    $valor = $_POST['valorSaque'] ?? '';

    $contaEncontrado = false;

    foreach (($_SESSION['banco'] ?? []) as $conta) {
      if ($conta->getNumero() === (int) $numeroConta) {
        $contaEncontrada = true;

        if ($conta->getAtiva()) {
          if ((float) $valor > $conta->getSaldo()) {
            $_SESSION['toast'] = [
              'tipo' => 'error',
              'mensagem' => 'O valor do saque é maior que o saldo atual da conta.'
            ];
          } else if ((float) $valor <= 0) {
            $_SESSION['toast'] = [
              'tipo' => 'error',
              'mensagem' => 'Valor de saque inválido.'
            ];
          } else {
            $conta->sacar((float) $valor);

            $_SESSION['toast'] = [
              'tipo' => 'success',
              'mensagem' => 'Saque realizado com sucesso.'
            ];
          }

        } else {
          $_SESSION['toast'] = [
            'tipo' => 'error',
            'mensagem' => 'Conta não está ativa.'
          ];
        }

        break;
      }
    }

    if (!$contaEncontrado) {
      $_SESSION['toast'] = [
        'tipo' => 'error',
        'mensagem' => 'Conta não encontrada.'
      ];
    }

    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
    exit;
  }

  if (($_POST['acao'] ?? '') === 'transferir') {
    $contaOrigem = $_POST['numContaOrigem'] ?? '';
    $contaDestino = $_POST['numContaDestino'] ?? '';
    $valor = (float) $_POST['valorTransf'] ?? 0;

    $origem = null;
    $destino = null;

    foreach (($_SESSION['banco'] ?? []) as $conta) {
      if ($conta->getNumero() === (int) $contaOrigem) {
        $origem = $conta;
      } 
      
      if ($conta->getNumero() === (int) $contaDestino) {
        $destino = $conta;
      }
    }

    if (!$origem || !$destino) {
      $_SESSION['toast'] = [
        'tipo' => 'error',
        'mensagem' => 'Conta de origem ou destino não encontrada.'
      ];
    } else if (!$origem->getAtiva() || !$destino->getAtiva()) {
      $_SESSION['toast'] = [
        'tipo' => 'error',
        'mensagem' => 'Conta de origem ou destino não ativada.'
      ];
    } else if ($origem->getNumero() === $destino->getNumero()) {
      $_SESSION['toast'] = [
        'tipo' => 'error',
        'mensagem' => 'Não é possível realizar uma transferência para a mesma conta.'
      ];
    } else if ($valor > $origem->getSaldo()) {
      $_SESSION['toast'] = [
        'tipo' => 'error',
        'mensagem' => 'Valor inválido.'
      ];
    } else if ($origem->getSaldo() <= 0) {
      $_SESSION['toast'] = [
        'tipo' => 'error',
        'mensagem' => 'Saldo insuficiente.'
      ];
    } else {
      $origem->sacar($valor);
      $destino->depositar($valor);

      $_SESSION['toast'] = [
        'tipo' => 'success',
        'mensagem' => 'Transferência realizada com sucesso.'
      ];
    }

    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
    exit;
  }

  if (isset($_SESSION['toast'])) {
    $toast = $_SESSION['toast'];

    $classe = $toast['tipo'] == 'success' ? 'bg-green-600' : 'bg-red-600';

    echo "
      <div class=\"toast flex items-center flex-row gap-1.5 fixed bottom-5 right-5 {$classe} text-white px-3! py-1.5! rounded-md transition-[opacity] duration-300 ease-in-out z-9999 \">
        <span class=\"flex bg-[#00000020] py-1! px-1.5! rounded-sm leading-none\">ⓘ</span>
        <p class=\"font-semibold leading-none\">{$toast['mensagem']}</p>
      </div>
    ";

    unset($_SESSION['toast']);
  }
?>