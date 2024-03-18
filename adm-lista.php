<?php 
include('adm-autenticacao.php');
require('conexaobd.php');
?>
<?php 
//consulta ao bd
$query_rs_curso = "SELECT * FROM tb_cursos INNER JOIN tb_areas ON tb_areas.idArea = tb_cursos.idArea ORDER BY tb_cursos.idCurso DESC";

$rs_curso = mysqli_query($conn_bd_ctec, $query_rs_curso) or die(mysqli_error($conn_bd_ctec));

$row_rs_curso = mysqli_fetch_assoc($rs_curso);

$totalRow_rs_curso = mysqli_num_rows($rs_curso);
//echo($totalRow_rs_curso);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Painel Administrativo do Site</title>
</head>

<body>
<img src="imagens/logo-ctec.png" width="100" alt=""/>

<h1>Painel Administrativo do Site - Lista</h1>	
	
	 <a href="adm-logout.php" > <img src="imagens/close.png"></a>
    <a href="adm_usuario.php" > <img src="imagens/close.png"></a>
    
    
    
<table width="100%" border="0">
  <tbody>
    <tr>
      <td><strong>Inserir</strong></td>
      <td><strong>Editar</strong></td>
      <td><strong>Excluir</strong></td>
      <td><strong>Id</strong></td>
      <td><strong>Título</strong></td>
      <td><strong>Ativo</strong></td>
      <td><strong>Home</strong></td>
      <td><strong>Área</strong></td>
      <td><strong>Img</strong></td>
      <td><strong>Visualização</strong></td>
    </tr>
	  
<!-- início do loop -->	  
<?php do { ?>	  
    <tr>
      <td>
		  <a href="adm-inserir.php">
		  <img src="imagens/inserir.png" width="20" height="20" alt=""/>
		</a>
	</td>
		  
      <td>
          <a href="adm-editar.php?idCurso=<?php echo($row_rs_curso['idCurso']);?>">
          <img src="imagens/edit.gif" width="16" height="15" alt=""/></td>
          </a>
      <td>
          <a href="adm-excluir.php?idCurso=<?php echo($row_rs_curso['idCurso']);?>" onClick="return confirm('Deseja realmente excluir?')" >
          <img src="imagens/delete.gif" width="16" height="15" alt=""/>
          </a>
      </td>
      <td><?php echo($row_rs_curso['idCurso']); ?></td>
      <td><?php echo($row_rs_curso['titulo']); ?></td>
      <td><?php echo($row_rs_curso['ativo']); ?></td>
      <td><?php echo($row_rs_curso['home']); ?></td>
      <td><?php echo($row_rs_curso['idArea']); ?></td>
      <td><img src="imagens/upload/<?php echo($row_rs_curso['img1Thumb']); ?>" width=50></td>
      <td><?php echo($row_rs_curso['visualizacao']); ?></td>
    </tr>
    <tr>
      <td colspan="10"><hr></td>
    </tr>
<?php } while($row_rs_curso = mysqli_fetch_assoc($rs_curso)); ?>	  
<!-- fim do loop -->	  	  
	  
  </tbody>
</table>
	
<?php 
mysqli_free_result($rs_curso);
mysqli_close($conn_bd_ctec);	
?>	
	
</body>
</html>