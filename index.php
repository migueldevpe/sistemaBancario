<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-font-size=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Sistema Bancário</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
    * {
      scroll-behavior: smooth;
      scrollbar-width: thin;
      margin: 0;
      /* padding: 0;  */
      box-sizing: border-box;
      line-height: 1;
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body>
  <?php require_once('./app/config/sistema.php') ?>

  <script>
    const toast = document.querySelectorAll(".toast").forEach(toast => {
      setTimeout(() => {
        toast.classList.add('opacity-0');

        setTimeout(() => {
          toast.remove();
        }, 500)
      }, 6000)
    })
  </script>

  <main class="max-w-[1375px] p-4!">
    <div class="flex min-[1300px]:flex-row max-[1300px]:flex-col items-start justify-between gap-4">
      <div class="min-[625px]:grid min-[625px]:grid-cols-[1fr_1fr] max-[625px]:flex max-[625px]:items-stretch max-[625px]:flex-col justify-center items-baseline gap-2 min-[1300px]:sticky min-[1300px]:top-4 w-full min-[1250px]:max-w-[660px]">
        <fieldset class="[all:revert] block! rounded-md!">
          <legend class="[all:revert] text-2xl! font-semibold!">Cadastrar</legend>
          <form
            action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
            method="POST"
            class="[all:revert] flex! flex-col! gap-2!"
          >
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="nome"
                id="nome"
                placeholder=""
                required
                class="peer [all:revert] flex-1! p-2!"
              >
              <label
                for="nome"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Nome</label>
            </div>
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="doc"
                id="doc"
                placeholder=""
                required
                class="peer [all:revert] flex-1! p-2!"
              >
              <label
                for="doc"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Documento</label>
            </div>
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="email"
                id="email"
                placeholder=""
                class="peer [all:revert] flex-1! p-2!"
                required
              >
              <label
                for="email"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Email</label>
            </div>
            <button
              type="submit"
              name="acao"
              value="cadastrar"
              class="[all:revert] flex-1! p-2! font-semibold! cursor-pointer!"
            >Enviar</button>
          </form>
        </fieldset>
        <fieldset class="[all:revert] block! rounded-md!">
          <legend class="[all:revert] text-2xl! font-semibold!">Transferência</legend>
          <form
            action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
            method="POST"
            class="[all:revert] flex! flex-col! gap-2!"
          >
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="numContaOrigem"
                id="numContaOrigem"
                placeholder=""
                required
                class="peer [all:revert] flex-1! p-2!"
              >
              <label
                for="numContaOrigem"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Número da conta (ORIGEM)</label>
            </div>
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="numContaDestino"
                id="numContaDestino"
                placeholder=""
                required
                class="peer [all:revert] flex-1! p-2!"
              >
              <label
                for="numContaDestino"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Número da conta (DESTINO)</label>
            </div>
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="valorTransf"
                id="valorTransf"
                placeholder=""
                class="peer [all:revert] flex-1! p-2!"
                required
              >
              <label
                for="valorTransf"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Valor (TRANSFERÊNCIA)</label>
            </div>
            <button
              type="submit"
              name="acao"
              value="transferir"
              class="[all:revert] flex-1! p-2! font-semibold! cursor-pointer!"
            >Transferir</button>
          </form>
        </fieldset>
        <fieldset class="[all:revert] block! rounded-md!">
          <legend class="[all:revert] text-2xl! font-semibold!">Abrir conta</legend>
          <form
            action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
            method="POST"
            class="[all:revert] flex! flex-col! gap-2!"
          >
            <div class="relative flex flex-col-reverse">
              <select
                name="tipo"
                id="tipo"
                required
                class="peer [all:revert] flex-1! p-2!"
              >
                <option value="" disabled selected>Selecione</option>
                <option value="corrente">Corrente</option>
                <option value="poupanca">Poupança</option>
                <option value="empresarial">Empresarial</option>
              </select>
              <label
                for="tipo"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Documento</label>
            </div>
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="email"
                id="email"
                placeholder=""
                class="peer [all:revert] flex-1! p-2!"
                required
              >
              <label
                for="email"
                class="peer-focus:top-0 peer-focus:text-[0.725rem] peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Email</label>
            </div>
            <button
              type="submit"
              name="acao"
              value="abrir_conta"
              class="[all:revert] flex-1! p-2! font-semibold! cursor-pointer!"
            >Abrir conta</button>
          </form>
        </fieldset>
        <fieldset class="[all:revert] block! rounded-md!">
          <legend class="[all:revert] text-2xl! font-semibold!">Sacar</legend>
          <form
            action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
            method="POST"
            class="[all:revert] flex! flex-col! gap-2!"
          >
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="numContaSaq"
                id="numContaSaq"
                placeholder=""
                required
                class="peer [all:revert] flex-1! p-2!"
              >
              <label
                for="numContaSaq"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Número da conta</label>
            </div>
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="valorSaque"
                id="valorSaque"
                placeholder=""
                class="peer [all:revert] flex-1! p-2!"
                required
              >
              <label
                for="valorSaque"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Valor (SAQUE)</label>
            </div>
            <button
              type="submit"
              name="acao"
              value="sacar"
              class="[all:revert] flex-1! p-2! font-semibold! cursor-pointer!"
            >Sacar</button>
          </form>
        </fieldset>
        <fieldset class="[all:revert] block! rounded-md!">
          <legend class="[all:revert] text-2xl! font-semibold!">Depositar</legend>
          <form
            action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>"
            method="POST"
            class="[all:revert] flex! flex-col! gap-2!"
          >
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="numConta"
                id="numConta"
                placeholder=""
                required
                class="peer [all:revert] flex-1! p-2!"
              >
              <label
                for="numConta"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Número da conta</label>
            </div>
            <div class="relative flex flex-col-reverse">
              <input
                type="text"
                name="valorDeposito"
                id="valorDeposito"
                placeholder=""
                class="peer [all:revert] flex-1! p-2!"
                required
              >
              <label
                for="valorDeposito"
                class="peer-focus:top-0 peer-focus:text-[0.725rem]  peer-focus:left-2 peer-focus:px-1! peer-focus:text-[black] peer-not-placeholder-shown:top-0 peer-not-placeholder-shown:text-[0.725rem] peer-not-placeholder-shown:left-2 peer-not-placeholder-shown:px-1! peer-not-placeholder-shown:text-[black] absolute top-1/2 -translate-y-1/2 left-2 text-[gray] font-semibold bg-white px-0! rounded-lg transition-[top,font-size,left,padding,color] duration-300 ease-in-out leading-[1rem]"
              >Valor (DEPÓSITO)</label>
            </div>
            <button
              type="submit"
              name="acao"
              value="depositar"
              class="[all:revert] flex-1! p-2! font-semibold! cursor-pointer!"
            >Depositar</button>
          </form>
        </fieldset>
      </div>
      <div class="flex flex-col min-[1300px]:items-end items-stretch justify-center gap-2 max-[625px]:w-full min-[1300px]:sticky min-[1300px]:top-4">
        <fieldset class="<?= "[all:revert] block! " . (count($_SESSION['clientes'] ?? []) > 1 ? "min-[625px]:max-w-140!" : "min-[625px]:max-w-70!") . " max-[625px]:max-w-auto! w-full! rounded-md!" ?>">
          <legend class="[all:revert] text-2xl! font-semibold!">Clientes cadastrados</legend>
          <div class="flex flex-col gap-2">
            <div class="<?= "min-[625px]:grid max-[625px]:flex " . (count($_SESSION['clientes']) > 1 ? "min-[625px]:grid-cols-2" : "min-[625px]:grid-cols") . " max-[625px]:flex-col gap-2 p-2! rounded-sm border-1 border-[#9c9c9c]" ?>">
              <?php
                if (!empty($_SESSION['clientes'])) {
                  foreach (($_SESSION['clientes'] ?? []) as $index => $cliente) {
                    $contaCliente = null;
                    foreach (($_SESSION['banco'] ?? []) as $conta) {
                      if ($conta->getCliente()->getEmail() === $cliente->getEmail()) {
                        $contaCliente = $cliente->getConta();
                        break;
                      }
                    }
                    echo "
                      <div class=\"flex flex-col gap-1.25 p-2.5! rounded-sm border-1 border-[#9c9c9c]\">
                        <span class=\"leading-[1rem]\">
                          Identificador: <strong class=\"font-semibold!\">" . ($index ?? "Nulo") . "</strong>
                        </span>
                        <span class=\"leading-[1rem]\">
                          Nome: <strong class=\"font-semibold!\">" . ($cliente->getNome() === '' ? "Nome não identificado." : $cliente->getNome()) . "</strong>
                        </span>
                        <span class=\"leading-[1rem]\">
                          Documento: <strong class=\"font-semibold!\">" . ($cliente->getDocumento() === '' ? "000.000.000-00" : $cliente->getDocumento()) . "</strong>
                        </span>
                        <span class=\"leading-[1rem]\">
                          E-mail: <strong class=\"font-semibold!\">" . ($cliente->getEmail() === '' ? "E-mail não identificado." : $cliente->getEmail()) . "</strong>
                        </span>
                        <span class=\"leading-[1rem]\">
                          Situação da conta: <strong class=\"font-semibold!\">" . ($contaCliente ? ($contaCliente->getAtiva() ? "Aberta" : "Fechada") : "Fechada") . "</strong>
                        </span>
                      </div>
                    ";
                  }
                } else {
                  echo "<span>Nenhum cliente cadastrado.</span>";
                }
              ?>
            </div>
            <a
              href="?deletar=deletar"
              class="flex gap-2 self-end bg-red-600 text-white font-semibold px-3! py-1! rounded-md hover:bg-red-700"
            >
              <span>🗑</span>
              <p>Limpar</p>
            </a>
          </div>
        </fieldset>
        <fieldset class="<?= "[all:revert] block! " . (count($_SESSION['banco'] ?? []) > 1 ? "min-[625px]:max-w-140!" : "min-[625px]:max-w-70!") . " max-[625px]:max-w-auto! w-full! rounded-md!" ?>">
          <legend class="[all:revert] text-2xl! font-semibold!">Contas abertas</legend>
          <div class="flex flex-col gap-2">
            <div class="<?= "min-[625px]:grid max-[625px]:flex " . (count($_SESSION['banco']) > 1 ? "min-[625px]:grid-cols-2" : "min-[625px]:grid-cols") . " max-[625px]:flex-col gap-2 p-2! rounded-sm border-1 border-[#9c9c9c]" ?>">
              <?php
                if (!empty($_SESSION['banco'])) {
                  foreach (($_SESSION['banco'] ?? []) as $cliente) {
                    echo "
                      <div class=\"flex flex-col gap-1.25 p-2.5! rounded-sm border-1 border-[#9c9c9c]\">
                        <span class=\"leading-[1rem]\">
                          Nome: <strong class=\"font-semibold!\">" . ($cliente->getCliente()->getNome() === '' ? "Nome não identificado." : $cliente->getCliente()->getNome()) . "</strong>
                        </span>
                        <span class=\"leading-[1rem]\">
                          Documento: <strong class=\"font-semibold!\">" . ($cliente->getCliente()->getDocumento() === '' ? "000.000.000-00" : $cliente->getCliente()->getDocumento()) . "</strong>
                        </span>
                        <span class=\"leading-[1rem]\">
                          Tipo de conta: <strong class=\"font-semibold!\">" . $cliente->getTipo() . "</strong>
                        </span>
                        <span class=\"leading-[1rem]\">
                          Número da conta: <strong class=\"font-semibold!\">" . $cliente->getNumero() . "</strong>
                        </span>
                        <span class=\"leading-[1rem]\">
                          Saldo: <strong class=\"font-semibold!\">R$ " . number_format($cliente->getSaldo(), 2, ',', '.') . "</strong>
                        </span>
                      </div>
                    ";
                  }
                } else {
                  echo "<span>Nenhum cliente com conta aberta.</span>";
                }
              ?>
            </div>
            <a
              href="?deletarAberta=deletarAberta"
              class="flex gap-2 self-end bg-red-600 text-white font-semibold px-3! py-1! rounded-md hover:bg-red-700"
            >
              <span>🗑</span>
              <p>Limpar</p>
            </a>
          </div>
        </fieldset>
      </div>
    </div>
  </main>
</body>
</html>