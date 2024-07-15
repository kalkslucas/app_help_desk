<?php
  session_start();
  /*
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
//remover indices do array de sessao -> unset()

  unset($_SESSION['x']); //inteligente para remover apenas se existir
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
//ou
//destruir a variavel de sessao -> session_destroy()

  session_destroy(); //será destruída porém, somente na próxima requisição que não teremos acesso as variáveis de sessão
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
  */
  session_destroy();
  header("Location: index.php");