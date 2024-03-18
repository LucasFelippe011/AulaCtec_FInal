<?php 
include('adm-autenticacao.php');
require('conexaobd.php');

//Capturar post do form e validar com isset
if(isset($_POST['submit'])){
$idArea = $_POST['idArea'];   
$idCurso = $_POST['idCurso'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$descricao = $_POST['descricao'];
$publicoAlvo = $_POST['publicoAlvo'];
$cargaHoraria = $_POST['cargaHoraria'];
$preRequisito = $_POST['preRequisito'];   
$horario = $_POST['horario']; 
$ead = $_POST['ead']; 
$vagas = $_POST['vagas'];    
$certificacao = $_POST['certificacao'];    
$valor = $_POST['valor'];  
   
     
$video = $_POST['video'];    
$home = $_POST['home'];  
$ativo = $_POST['ativo']; 
    
    
// upload das imagens
$diretorio = "imagens/upload/";

//img1
set_time_limit(0);
$id_img1 = "img1"; // Var para o nome do campo
 $img1Nome =  $_FILES[$id_img1]["name"] ;
    
$id_img1Thumb = "img1Thumb"; 
$img1ThumbNome = $_FILES[$id_img1Thumb]["name"];
    
    
//Corrigir erro ao gravar vazio
if($img1Nome != ''){
    unlink($diretorio.$_REQUEST['img1G']);
    $img1Temp = $_FILES[$id_img1]["tmp_name"];
    move_uploaded_file($img1Temp,$diretorio.$img1Nome);
} else{
    $img1Nome = $_REQUEST['img1G'];
};

if($img1ThumbNome != ''){
    unlink($diretorio.$_REQUEST['img1ThumbM']);
    $img1ThumbTemp = $_FILES[$id_img1Thumb]["tmp_name"];
    move_uploaded_file($img1ThumbTemp,$diretorio.$img1ThumbNome);
} else{
    $img1ThumbNome = $_REQUEST['img1ThumbM'];
};
    
    
    
//Editar dados do registro
$editar = "UPDATE tb_cursos SET idArea = '$idArea', titulo = '$titulo', subtitulo = '$subtitulo', descricao = '$descricao', publicoAlvo = '$publicoAlvo', cargaHoraria = '$cargaHoraria', preRequisito = '$preRequisito', horario = '$horario', ead = '$ead', vagas = '$vagas', certificacao = '$certificacao', valor = '$valor', img1 = '$img1Nome', img1Thumb = '$img1ThumbNome', video = '$video', home = '$home', ativo = '$ativo' WHERE idCurso = '$idCurso'";

$resultado = mysqli_query($conn_bd_ctec, $editar) or die(mysqli_error($conn_bd_ctec));

if(!$resultado){
	die("ERROR".mysqli_error($conn_bd_ctec));
} else{
	header("Location: adm-lista.php");
};

}; //fechamento do isset de update
	


//Consulta para passagem de parametro
if(isset($_GET['idCurso'])){
	$id = $_GET['idCurso'];
}; //fechamento isset da consulta

$query_rs_curso = "SELECT * FROM tb_cursos INNER JOIN tb_areas ON tb_cursos.idArea = tb_areas.idArea WHERE tb_cursos.idCurso = $id";

$rs_curso = mysqli_query($conn_bd_ctec, $query_rs_curso) or die(mysqli_error($conn_bd_ctec));

$row_rs_curso = mysqli_fetch_assoc($rs_curso);

$totalRow_rs_curso = mysqli_num_rows($rs_curso);
//echo($totalRow_rs_curso);
//echo($row_rs_curso['idCurso']);

//consulta a tabela de area
$query_rs_area = "SELECT * FROM tb_areas";
$rs_area = mysqli_query($conn_bd_ctec, $query_rs_area);
$row_rs_area = mysqli_fetch_assoc($rs_area);
	


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Registro - Administração do Site</title>
</head>

<body>
	
<h1>Editar Registro - Administração do Site</h1>	
	
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" id="form_editar">
	
Id: <?php echo($row_rs_curso['idCurso']); ?> 	
<input name="idCurso" type="hidden" id="idCurso" value="<?php echo($row_rs_curso['idCurso']); ?>">
	
<input name="dataCad" type="hidden" id="dataCad" value="<?php echo($row_rs_curso['dataCad']); ?>"><br><br>
	
Id Área: 
<select name="idArea" id="idArea">
    
    <?php do{ ?>
  <option value="<?php  echo($row_rs_area['idArea'])  ?>" <?php if($row_rs_curso['idArea'] === $row_rs_area['idArea']){echo "selected=\"selected\"";}; ?>><?php  echo($row_rs_area['area'])  ?></option>
    <?php } while($row_rs_area = mysqli_fetch_assoc($rs_area)); ?>
</select>	
	
<br><br>

Título do Curso: <input name="titulo" type="text" required="required" id="titulo" size="100" value="<?php echo($row_rs_curso['titulo']); ?>"><br><br>
		
Subtitulo do Curso: <input name="subtitulo" type="text" id="subtitulo" size="100" value="<?php echo($row_rs_curso['subtitulo']); ?>"><br><br>

Descrição:<br>
<textarea name="descricao" cols="60" rows="10" id="descricao"> <?php echo($row_rs_curso['descricao']); ?> </textarea><br><br>
	
Público Alvo: <input name="publicoAlvo" type="text" id="publicoAlvo" size="100" value="<?php echo($row_rs_curso['publicoAlvo']); ?>"><br><br>

Carga Horária: <input name="cargaHoraria" type="number" id="cargaHoraria" max="1600" min="0" value="<?php echo($row_rs_curso['cargaHoraria']); ?>"><br><br>

Pré-requisito:	<input name="preRequisito" type="text" id="preRequisito" size="100" value="<?php echo($row_rs_curso['preRequisito']); ?>"><br><br>
	
Horário: <input name="horario" type="text" id="horario" size="100" value="<?php echo($row_rs_curso['horario']); ?>"><br><br>

EAD: 
<input name="ead" type="hidden" value="0">
<input name="ead" type="checkbox" value="1" <?php if($row_rs_curso['ead'] == 1 ){echo "checked=\"checked\""; };  ?>> <br><br>

Vagas: <input name="vagas" type="number" id="vagas" max="999" min="0" value="<?php echo($row_rs_curso['vagas']); ?>"><br><br>

Certificação: 
<input name="certificacao" type="hidden" id="certificacao" value="0">
<input name="certificacao" type="checkbox" id="certificacao" value="1" <?php if($row_rs_curso['certificacao'] == 1 ){echo "checked=\"checked\""; };  ?>><br><br>

Investimento: <input name="valor" type="text" id="valor" value="<?php echo($row_rs_curso['valor']); ?>"><br><br>

    
    
Imagem grande: <?php echo($row_rs_curso['img1'])?> <br>
<img src="imagens/upload/<?php echo($row_rs_curso['img1']); ?>" width="100">
    
    

    <input name="img1G" type="hidden" id="img1G" value="<?php echo($row_rs_curso['img1']);?>"><br>

    <input name="img1" type="file" id="img1"><br><br>
    
        


<br>
Imagem pequena: <?php echo($row_rs_curso['img1Thumb'])?> <br>
<img src="imagens/upload/<?php echo($row_rs_curso['img1Thumb']); ?>" width="100"><br>
    
    <input name="img1ThumbM" type="hidden" id="img1ThumbM" value="<?php echo($row_rs_curso['img1Thumb']);?>"><br><br>


    
    <input name="img1Thumb" type="file" id="img1Thumb"><br><br>
    
    
    
    
	
Vídeo: <input name="video" type="text" id="video" size="100" value="<?php echo($row_rs_curso['video']); ?>"><br><br>

Exibir na Home: 
<input name="home" type="hidden" id="home" value="0">
<input name="home" type="checkbox" id="home" value="1" <?php if($row_rs_curso['home'] == 1 ){echo "checked=\"checked\""; }; ?>><br><br>

Curso Ativo: 
<input name="ativo" type="hidden" id="ativo" value="0">
<input name="ativo" type="checkbox" id="ativo" value="1" <?php if($row_rs_curso['ativo'] == 1 ){echo "checked=\"checked\""; };?>><br><br>

<br><br><br><br><br>
<input name="submit" type="submit" id="submit">	
	
</form>	
	
	
</body>
</html>