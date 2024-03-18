<?php 
session_start();
session_destroy(); // Destruir todas as sessões logadas

header('location: adm-login.php');
exit();

?>