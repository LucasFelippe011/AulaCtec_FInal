<?php require("conexaobd.php"); ?>

<?php 
//Criar a consulta com o bd
//O conteúdo da página deverá vir da consulta ao bd
$query_rs_curso = "SELECT * FROM tb_cursos INNER JOIN tb_areas ON tb_cursos.idArea = tb_areas.idArea WHERE tb_cursos.ativo = 1 AND tb_cursos.home = 1 ORDER BY tb_cursos.idCurso DESC";

//Executar a consulta
$rs_curso = mysqli_query($conn_bd_ctec, $query_rs_curso) or die(mysqli_error($conn_bd_ctec));

//Total de registros encontrados na consulta
$totalRow_rs_curso = mysqli_num_rows($rs_curso);
//echo($totalRow_rs_curso);

//Obter UMA linha do resutlado como array
$row_rs_curso = mysqli_fetch_assoc($rs_curso);
//echo($row_rs_curso["titulo"]);
//echo($row_rs_curso["idCurso"]);

$query_rs_curso_visu = "SELECT * FROM tb_cursos WHERE tb_cursos.ativo = 1  ORDER BY tb_cursos.visualizacao DESC LIMIT 4";

$rs_curso_visu = mysqli_query($conn_bd_ctec, $query_rs_curso_visu) or die(mysqli_error($conn_bd_ctec));

$totalRow_rs_curso_visu = mysqli_num_rows($rs_curso_visu);

$row_rs_curso_visu = mysqli_fetch_assoc($rs_curso_visu);



?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<!-- Título EXCLUSIVO, não pode ser repetido em outras páginas e no máximo de 60 caracteres -->
<title>Ctec - Cursos de Tecnologia</title>
<!-- Breve descrição do site para o google máx. 147 -->
<meta name="description" content="Desenvolvimento de cursos de tecnologia da informa&ccedil;&atilde;o com HTML5, CSS3, PHP e JavaScript.">
<meta name="keywords" content="desenvolvimento, cursos, tecnologia, ti, html5, css3, php, javascript, script, treinamento, website, site, boostrap">

<!-- Head Comum -->     
<?php include("_head_comum.php"); ?>
<!-- FIM Head Comum -->    
    
</head>

<body>
<!-- Nível de importância da página -->
 <main>
    
<h1 class="fonte-zero">Ctec - Cursos de Tecnologia</h1>    
    
<header>
<!-- Topo -->     
<?php include("_topo.php"); ?>
<!-- FIM Topo -->    
</header>    

<!-- Menu --> 
<?php include("_menu.php"); ?>
<!-- FIM Menu -->     
    
<!-- Galeria de imagens --> 
<?php include("_galeria.php"); ?>     
<!-- FIM Galeria de imagens -->          
     
<!-- Conteúdo -->     
<div class="container-fluid">
  
<div class="alert alert-primary" role="alert" style="text-align: center">
<h2>Cursos em Destaque</h2>
</div>    

<?php include("_conteudo.php"); ?>    
     
</div>     
<!-- FIM Conteúdo -->  
     
     <div class="alert alert-primary" role="alert" style="text-align: center; color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;">
<h2>Cursos Mais visualizados</h2>
</div>
    
<div class="container">
<div class="row">
    <?php do{ ?> 
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
<section style="text-align: center "> <a href="imagens/upload/<?php echo($row_rs_curso_visu["img1"]) ?>" data-lightbox="example-1" title="<?php echo($row_rs_curso_visu["titulo"]) ?>">
<img src="imagens/upload/<?php echo($row_rs_curso_visu["img1Thumb"]) ?>" title="<?php echo($row_rs_curso_visu["titulo"]) ?>" alt="<?php echo($row_rs_curso_visu["titulo"]) ?>" class="img-fluid img-thumbnail ">
</a> <br> <h3 class="fonte-zero"> Curso</h3>
            <details>
        <summary> 
        <i class="bi bi-caret-right-fill"></i>
        <?php echo($row_rs_curso_visu["titulo"]) ?>
            
        </summary>
        <p><?php echo($row_rs_curso_visu["subtitulo"]) ?></p>        
        </details>
            <br>
            <a class="btn btn-outline-success " href="detalhes.php?idCurso=<?php echo($row_rs_curso_visu["idCurso"]) ?> " title="Detalhes">+ Detalhes</a>
            <br>
            <br>
        </section>
     </div>  <?php } while($row_rs_curso_visu = mysqli_fetch_assoc($rs_curso_visu)); ?>
      

  </div>

    
    
</div>
<!-- Rodapé -->     
<?php include("_rodape.php"); ?>    
<!-- FIM Rodapé -->          
     
</main>  

<!-- Complementos --> 
<?php include("_complementos.php"); ?>   
<!-- FIM Complementos -->
	
	<!--libera a memoria associada ao resultado da ao BD-->
	<?php 
	
	mysqli_free_result($rs_curso);
		
		
		//fecha conexao
	mysqli_close($conn_bd_ctec);
		
    ?>
</body>
</html>
