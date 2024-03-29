<?php 

require("../../database/conexao.php");

$sql = " SELECT * FROM tbl_produto ";

$resultado = mysqli_query($conexao, $sql);

//se o usuario não estiver logado
if(!isset($_SESSION["usuarioId"])) {

//redireciona para a página de produtos com mensagem de erro
$_SESSION["mensagem"] = "Você precisa fazer login para acessar esta página.";

header("location: ../index.php");

}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles-global.css" />
  <link rel="stylesheet" href="./novo.css" />
  <title>Administrar Produtos</title>
</head>

<body>
<?php
include ("../../componentes/header/header.php");
?>
  <div class="content"></div>

  <div style="position: absolute; top: 0; right: 0;"></div>
  <?php
  if (isset($_SESSION["erros"])) {
    echo $_SESSION["erros"][0];
  }

  if(isset($_SESSION["mensagem"])){
    echo

  
    <section class="produtos-container">
      <?php

      //autorização

      //se o usuário estiver logado, mostre os botões
      if (isset($_SESSION["usuarioid"])) {
      <main>
        <form class="form-produto" method="POST" action="administra.php">
        <input type="hidden" name="acao" value="inserir" />
          <h1>Cadastro de produto</h1>
          <ul>

          <?php
          
          #verifica se existe erros na sessão do usuário
          if(isset($_SESSION["erros"])) {
            #se existir percorre os erros e exibe na tela
            foreach($_SESSION["erros"] as $erro){
              ?>

              <li><?= $erro ?></li>
          <?php 
            }
            #eliminar da sessão os erros já mostrados
            unset($_SESSION["erros"]);
          }
          ?>

          </ul>
          <div class="input-group span2">
            <label for="descricao">Descrição</label>
            <input name="descricao" type="text" id="descricao" required>
          </div>
          <div class="input-group">
            <label for="peso">Peso</label>
            <input name="peso" type="text" id="peso" required>
          </div>
          <div class="input-group">
            <label for="quantidade">Quantidade</label>
            <input name="quantidade" type="text" id="quantidade" required>
          </div>
          <div class="input-group">
            <label for="cor">Cor</label>
            <input name="cor" type="text" id="cor" required>
          </div>
          <div class="input-group">
            <label for="tamanho">Tamanho</label>
            <input name="tamanho" type="text" id="tamanho">
          </div>
          <div class="input-group">
            <label for="valor">Valor</label>
            <input name="valor" type="text" id="valor" required>
          </div>
          <div class="input-group">
            <label for="desconto">Desconto</label>
            <input name="desconto" type="text" id="desconto">
          </div>
          <button onclick="javascript:window.location.href = '../'">Cancelar</button>
          <button>Salvar</button>
        </form>
      </main>
    </section>
  </div>
  <footer>
    SENAI 2021 - Todos os direitos reservados
  </footer>
</body>

</html>