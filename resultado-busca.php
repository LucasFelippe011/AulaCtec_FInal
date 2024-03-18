<?php require("conexaobd.php"); ?>

<?php 

//criando a variavel para consultar por ID e usar como passagem de parametro no link detalhes 
if(isset($_GET['palavra'])){
$palavra = $_GET['palavra'];
}




//Criar a consulta com o bd
//O conteúdo da página deverá vir da consulta ao bd
//faz a pesquisa no banco de dados, e apresenta no site
$query_rs_curso = "SELECT * FROM `tb_cursos` INNER JOIN tb_areas on tb_areas.idArea = tb_cursos.idArea WHERE tb_cursos.ativo = 1 AND tb_cursos.titulo LIKE'%$palavra%' or tb_cursos.subtitulo LIKE '&$palavra%' or tb_cursos.descricao LIKE '%$palavra%' ORDER BY tb_cursos.titulo ASC";

//Executar a consulta
$rs_curso = mysqli_query($conn_bd_ctec, $query_rs_curso) or die(mysqli_error($conn_bd_ctec));

//Total de registros encontrados na consulta
$totalRow_rs_curso = mysqli_num_rows($rs_curso);
//echo($totalRow_rs_curso);

//Obter UMA linha do resutlado como array
$row_rs_curso = mysqli_fetch_assoc($rs_curso);
//echo($row_rs_curso["titulo"]);
//echo($row_rs_curso["idCurso"]);

?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<!-- Título EXCLUSIVO, não pode ser repetido em outras páginas e no máximo de 60 caracteres -->
<title>Resultado Busca - Ctec</title>
<!-- Breve descrição do site para o google máx. 147 -->
<meta name="description" content="Cursos de tecnologia na área de TI.">
<meta name="keywords" content="desenvolvimento, cursos, tecnologia, ti, html5, css3, php, javascript, script, treinamento, website, site, boostrap">

<!-- Head Comum -->     
<?php include("_head_comum.php"); ?>
<!-- FIM Head Comum -->    
    
</head>

<body>
<!-- Nível de importância da página -->
 <main>
    
<h1 class="fonte-zero">Resultado Busca - Ctec</h1>    
    
<header>
<!-- Topo -->     
<?php include("_topo.php"); ?>
<!-- FIM Topo -->    
</header>    

<!-- Menu --> 
<?php include("_menu.php"); ?>
<!-- FIM Menu -->     
    
     
<!-- Conteúdo -->     
<div class="container-fluid">
  
<div class="alert alert-primary" role="alert" style="text-align: center">
<h2>Resultado Busca </h2>
<p><?php echo($totalRow_rs_curso); ?> cursos encontrados.</p>    
</div>    

<?php include("_conteudo.php"); ?>    
     
</div>     
<!-- FIM Conteúdo -->     
     
<!-- Rodapé -->     
<?php include("_rodape.php"); ?>    
<!-- FIM Rodapé -->          
     
</main>  

<!-- Complementos --> 
<?php include("_complementos.php"); ?>   
<!-- FIM Complementos -->    
    
</body>
</html>
