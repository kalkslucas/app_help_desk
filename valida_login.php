<?php
session_start();
/*
$_SESSION['x'] = 'Teste de sessão';
print_r($_SESSION);
echo '<hr>';
*/
//variável que identifica se o usuário foi autenticado
$autentica_usuario = false;

//Usuários do sistema
$usuarios_app = array(
  array('email' => 'adm@teste.com.br', 'senha' => '123456'),
  array('email' => 'user@teste.com.br', 'senha' => 'abcd')
);

/*
echo "<pre>";
$print_r = print_r($usuarios_app);
echo "</pre>";

*/

foreach ($usuarios_app as $user){
  if($user['email'] === $_POST['email'] && $user['senha'] === $_POST['senha']){
    $autentica_usuario = true;
  }
}

if($autentica_usuario){
  header("Location: home.php");
  $_SESSION['autenticado'] = 'SIM';
  $_SESSION['x'] = 'um valor';
  $_SESSION['y'] = 'outro valor';
}else{
  header("Location: index.php?login=erro");
  $_SESSION['autenticado'] = 'NÃO';
}

/*
print_r($_GET);

echo "$_GET[email] | $_GET[senha]";



print_r($_POST);

echo "$_POST[email] | $_POST[senha]";

*/

