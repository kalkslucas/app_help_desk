<?php 
require_once 'validador_acesso.php';
$arquivo = fopen('../../app_help_desk/arquivo.hd', 'r');

//Laço de repetição para recuperar as linhas de registros do arquivo
while(!feof($arquivo)){//feof -> testando o fim do arquivo
  //imprimindo as linhas
  $registro = fgets($arquivo);
  $chamados[] = $registro;
}

//fecha o arquivo aberto
fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

            <? foreach($chamados as $chamado) { ?>

              <?php
                //divide todos os itens da linha usando o # como uma quebra
                $chamados_dados = explode('#', $chamado);
                //verifica se o id do perfil do usuário da sessão é igual a 2 (PERFIL USUARIO)
                if($_SESSION['perfil_id'] == 2){
                  //controle de exibição do chamado somente pelo usuário
                  if($_SESSION['id'] != $chamados_dados[0]){
                    continue;
                  }
                }
              ?>


              <div class="card mb-3 bg-light">

                <div class="card-body">
                  <h5 class="card-title"><?=$chamados_dados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamados_dados[2]?></h6>
                  <p class="card-text"><?=$chamados_dados[3]?></p>
                </div>

              </div>

              <? } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>