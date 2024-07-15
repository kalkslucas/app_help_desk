<?php

//Montagem do texto
$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];

//Inserindo as variáveis no escopo do texto
$texto = "$titulo#$categoria#$descricao" . PHP_EOL ;

//Montando o arquivo txt
$arquivo = fopen('arquivo.hd', 'a');
fwrite($arquivo, $texto);
fclose($arquivo);
//echo $texto;

header('Location: abrir_chamado.php');