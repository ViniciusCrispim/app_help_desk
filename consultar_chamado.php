<? require_once('validador_acesso.php') ?>
<?php
  //Recuperação dos dados para exibição dos chamados.
  $chamados_abertos = array();

  $arquivo_texto = fopen('registro_chamados.hd', 'r');
  
  //Recupera os dados direto no array
  while(!feof($arquivo_texto)){
    $chamado = fgets($arquivo_texto);
    $chamados_abertos[] = explode('#', $chamado);
  }
  //Controle de exbibição
  if($_SESSION['perfil_id'] == 2){
    foreach($chamados_abertos as $key => $chamado){
      if($chamado[0] != $_SESSION['id']){
        unset($chamados_abertos[$key]);
      }
    }
  }

  fclose($arquivo_texto);
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
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <? foreach($chamados_abertos as $chamado){ ?>
                <?php
                  //Verificação se o array está completo ou vazio.
                  if(count($chamado) < 4 || empty($chamado)){
                    continue;
                  }
                ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado[2] ?></h6>
                    <p class="card-text"><?= $chamado[3] ?></p>
                  </div>
                </div>

              <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>