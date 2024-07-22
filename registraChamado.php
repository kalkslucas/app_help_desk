<?php
session_start();

//Montagem do texto
$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);

//Inserindo as variáveis no escopo do texto
$texto = $_SESSION['id']. '#' . $titulo. '#' . $categoria . '#' . $descricao . PHP_EOL;

//Montando o arquivo txt
$arquivo = fopen('../../app_help_desk/arquivo.hd', 'a');
fwrite($arquivo, $texto);
fclose($arquivo);
//echo $texto;

header('Location: abrir_chamado.php');