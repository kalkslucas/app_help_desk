<?php 
require_once 'validador_acesso.php';
$arquivo = fopen('arquivo.hd', 'r');

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
                $chamados_dados = explode('#', $chamado);
              ?>


              <div class="card mb-3 bg-light">

                <div class="card-body">
                  <h5 class="card-title"><?=$chamados_dados[0]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamados_dados[1]?></h6>
                  <p class="card-text"><?=$chamados_dados[2]?></p>
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