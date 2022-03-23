<?php
//consultando o banco de dados
$con = mysqli_connect('localhost', 'host', '', 'database_lista_clientes');
if(mysqli_connect_errno()){
    echo 'Houve um erro de conexão com o banco de dados.';
    exit;
}
?>