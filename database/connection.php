<?php
//conectando com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'datatable_db');
if(mysqli_connect_errno()){
    echo 'Houve um erro de conexão no banco de dados!';
    exit;
}
?>