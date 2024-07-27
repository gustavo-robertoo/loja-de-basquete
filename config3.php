<?php

  $dbHost = 'Localhost';
  $dbUsername = 'root';
  $dbPassword ='';
  $dbName = 'carrinho';

  $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
  mysqli_set_charset($conexao, 'utf8');
?>