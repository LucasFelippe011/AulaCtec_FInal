<?php require("conexaobd.php"); ?>

<?php
//criando a variavel para consultar por ID e usar como passagem de parametro no link detalhes 
if(isset($_GET['idCurso'])){
$idCurso = $_GET['idCurso'];
}



//Criar a consulta com o bd
//O conteúdo da página deverá vir da consulta ao bd
$query_rs_curso = "SELECT * FROM tb_cursos INNER JOIN tb_areas ON tb_cursos.idArea = tb_areas.idArea WHERE tb_cursos.ativo = 1 AND tb_cursos.idCurso = $idCurso;";


$query_rs_visita = "UPDATE tb_cursos SET visualizacao = tb_cursos.visualizacao + 1 WHERE tb_cursos.idCurso = $idCurso";

$rs_visita = mysqli_query($conn_bd_ctec,$query_rs_visita) or die(mysqli_error($conn_bd_ctec));


//Executar a consulta
$rs_curso = mysqli_query($conn_bd_ctec, $query_rs_curso) or die(mysqli_error($conn_bd_ctec));

//Total de registros encontrados na consulta
$totalRow_rs_curso = mysqli_num_rows($rs_curso);
//echo($totalRow_rs_curso);

//Obter UMA linha do resutlado como array
$row_rs_curso = mysqli_fetch_assoc($rs_curso);
//echo($row_rs_curso["titulo"]);
//echo($row_rs_curso["idCurso"]);

if($totalRow_rs_curso == 0){
	header('location: index.php');
};






?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<!-- Título EXCLUSIVO, não pode ser repetido em outras páginas e no máximo de 60 caracteres -->
<title><?php echo($row_rs_curso["titulo"]) ?></title>
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
    
<h1 class="fonte-zero"><?php echo($row_rs_curso["titulo"]) ?></h1>    
    
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
<h2><?php echo($row_rs_curso["titulo"]) ?></h2>
</div>    

<div class="container">
    


<section>    
<div class="row">
    
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
<h3><?php echo($row_rs_curso["idCurso"]) ?> - <?php echo($row_rs_curso["subtitulo"]) ?></h3> 
<p><?php echo($row_rs_curso["descricao"]) ?></p>
	
</div> 

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
<br>
<a href="imagens/upload/<?php echo($row_rs_curso["img1"]) ?>" title="<?php echo($row_rs_curso["titulo"]) ?>" data-lightbox="example-1">    
<img src="imagens/upload/<?php echo($row_rs_curso["img1Thumb"]) ?>" alt="<?php echo($row_rs_curso["titulo"]) ?>" title="<?php echo($row_rs_curso["titulo"]) ?>" class="img-fluid">    
</a>
</div>    
  
<div class="col-xl-12">
	<strong>Area:</strong> <?php echo($row_rs_curso["area"]) ?>
	</div>
	
	<div class="col-xl-12">
	<strong>Publico Alvo:</strong> <?php echo($row_rs_curso["publicoAlvo"]) ?>
</div>
	
	
	<div class="col-xl-12">
	<strong>Carga Horaria:</strong> <?php echo($row_rs_curso["cargaHoraria"]) ?>
</div>
	
	
	<div class="col-xl-12">
	<strong>Pre-requesito:</strong> <?php echo($row_rs_curso["preRequisito"]) ?>
</div>
	
	
	<div class="col-xl-12">
     <strong>Horario disponivel das turmas:</strong> <?php echo($row_rs_curso["horario"]) ?>
</div>
	
	
	
<div class="col-xl-12">
     <strong>Curso Presencial/on-oline:</strong>
	<?php 
	
if($row_rs_curso["ead"] == 0){
	echo("presencial");
}else{
	echo("on-online");
}
	
	

	
	?><br><br>
</div>
	
	
	<div class="col-xl-12">
     <strong>vagas por turma:</strong> <?php echo($row_rs_curso["vagas"]) ?>
		alunos<br><br>
</div>
	
	<div class="col-xl-12">
     <strong>Certificado:</strong>
		<?php 
		if($row_rs_curso ["certificacao"] == 1){
			echo("sim receba seu certificado de conclusao no final  do curso ");
		} else{
			echo("treinamento nao certificado");
		};
		
		?><br><br>
   </div>
<div class="col-xl-12 embed-responsive embed-responsive-16by9" <?php 
		 if(empty($row_rs_curso["video"])){echo "style='display: none'";}
		 ?>>

<iframe class="embed-responsive-item"
		  src="https://www.youtube.com/embed/<?php echo($row_rs_curso["video"]) ?>" allowfullscreen></iframe>
     
</div>
	
</div> 
</section>
<hr>
    
    
</div>   
     
</div>     
<!-- FIM Conteúdo -->     
     
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
