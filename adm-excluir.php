<?php

require('conexaobd.php');

if(isset($_GET['idCurso'])){
$idCurso = $_GET['idCurso'];
}

//$query_rs_area
$excluir = "DELETE FROM tb_cursos WHERE idCurso = $idCurso";

$rs_excluir = mysqli_query($conn_bd_ctec, $excluir) or die(mysqli_error($conn_bd_ctec));

//$row_rs_excluir = mysqli_fetch_assoc($rs_excluir);

//$totalRow_rs_curso = mysqli_num_rows($rs_excluir);

//Excluir arquivo da pasta upload
//unlink("imagens/upload/diablo.jpg");

$query_rs_img = "SELECT * FROM tb_cursos WHERE idCurso = $idCurso";
$rs_img = mysqli_query($conn_bd_ctec, $query_rs_img);
$row_rs_img = mysqli_fetch_assoc($rs_img);
unlink("imagens/upload/".$row_rs_img['img1']);
unlink("imagens/upload/".$row_rs_img['img1Thumb']);




$resultado = mysqli_query($conn_bd_ctec, $excluir);

if($resultado == TRUE){
    echo('<script> alert("Dados inseridos com sucesso!!")
    window.location.href="adm-lista.php";</script');
} else{
         ("Falha ao inserir dados!");
      };






?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>
<h1>Pagina excluir</h1>
    
<?php 
mysqli_free_result($rs_img);
    
mysqli_close($conn_bd_ctec);	
?>	
<body>
</body>
</html>