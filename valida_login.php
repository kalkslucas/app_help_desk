<?php
session_start();
/*
$_SESSION['x'] = 'Teste de sessão';
print_r($_SESSION);
echo '<hr>';
*/
//variável que identifica se o usuário foi autenticado
$autentica_usuario = false;
//variável que define o id do usuário e o perfil desse usupario
$usuario_id = null;
$usuario_perfil_id = null;
//array com os perfis para cada usuário
$perfis = array(1 => 'Admin', 2 => 'Usuário');

//Usuários do sistema
$usuarios_app = array(
  array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
  array('id' => 2, 'email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
  array('id' => 3, 'email' => 'user@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
  array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' => 2)
);

/*
echo "<pre>";
$print_r = print_r($usuarios_app);
echo "</pre>";

*/

foreach ($usuarios_app as $user){
  if($user['email'] === $_POST['email'] && $user['senha'] === $_POST['senha']){
    $autentica_usuario = true;
    $usuario_id = $user['id'];
    $usuario_perfil_id = $user['perfil_id'];
  }
}

if($autentica_usuario){
  header("Location: home.php");
  $_SESSION['autenticado'] = 'SIM';
  $_SESSION['id'] = $usuario_id;
  $_SESSION['perfil_id'] = $usuario_perfil_id;
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

