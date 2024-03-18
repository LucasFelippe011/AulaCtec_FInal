<?php 
//Métodos de conexão com o BD mysqli, mysql e pdo

//Conexão localhost com Dreamweaver
$hostname_conn_bd_ctec = "localhost";
$database_conn_bd_ctec = "bd_ctec";
$username_conn_bd_ctec = "root";
$password_conn_bd_ctec = "";
//Criando a conexão usando as variáveis
$conn_bd_ctec = mysqli_connect($hostname_conn_bd_ctec, $username_conn_bd_ctec, $password_conn_bd_ctec, $database_conn_bd_ctec) or trigger_error(mysqli_connect_errno(), e_user_error);


/*
//Conexão localhost com Servidor LOCAWEB
$hostname_conn_bd_ctec = "robb0463.publiccloud.com.br:3306";
$database_conn_bd_ctec = "ctsdigital2011_bd_ctec";
$username_conn_bd_ctec = "ctsdi_ti38";
$password_conn_bd_ctec = "Ti382024!!";
//Criando a conexão usando as variáveis
$conn_bd_ctec = mysqli_connect($hostname_conn_bd_ctec, $username_conn_bd_ctec, $password_conn_bd_ctec, $database_conn_bd_ctec) or trigger_error(mysqli_connect_errno(), e_user_error);

//Verificação da conexão
//echo("Conectado com sucesso!");



mysqli_set_charset();
*/
?>