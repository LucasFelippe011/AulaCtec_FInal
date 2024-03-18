<?php
include('adm-autenticacao.php');
require('conexaobd.php');
/*
//Dicas de servidores: Diretivas do php.ini no servidor de hospedagem
//echo phpversion();
//echo phpinfo();
session.auto_start = on
post_max_size = 50M
upload_max_filesize = 50M
memory_limit = 128M 
max_execution_time = 1000
max_input_time = 1000
*/



//Consulta da tabela de Área
$query_rs_area = "SELECT * FROM tb_areas ORDER BY area ASC";
$rs_area = mysqli_query($conn_bd_ctec, $query_rs_area);
$row_rs_area = mysqli_fetch_assoc($rs_area);
$totalRow_rs_area = mysqli_num_rows($rs_area);
//echo($totalRow_rs_area);










//validando a existencia dos dados
//if(){};

if(isset($_POST['idArea']) && isset($_POST['titulo']) && isset($_POST['subtitulo']) && isset($_POST['descricao']) && isset($_POST['publicoAlvo']) && isset($_POST['cargaHoraria']) && isset($_POST['preRequisito']) && isset($_POST['horario']) && isset($_POST['ead'])&& isset($_POST['vagas'])&& isset($_POST['certificacao'])&& isset($_POST['valor'])&& isset($_FILES['img1'])&& isset($_FILES['img1Thumb'])&& isset($_POST['video'])&& isset($_POST['home'])&& isset($_POST['ativo'])&& isset($_POST['cep'])&& isset($_POST['latitude'])&& isset($_POST['longitude'])&& isset($_POST['ip'])&& isset($_POST['visualizacao'])){

$idArea = $_POST["idArea"];
$titulo = $_POST["titulo"];
$subtitulo = $_POST["subtitulo"];
$descricao = $_POST["descricao"];
$publicoAlvo = $_POST["publicoAlvo"];
$cargaHoraria = $_POST["cargaHoraria"];
$preRequisito = $_POST["preRequisito"];
$horario = $_POST["horario"];
$ead = $_POST["ead"];
$vagas = $_POST["vagas"];
$certificacao = $_POST["certificacao"];
$valor = $_POST["valor"];
$img1 = $_FILES["img1"];
$img1Thumb = $_FILES["img1Thumb"];
$video = $_POST["video"];
$home = $_POST["home"];
$ativo = $_POST["ativo"];
$cep = $_POST["cep"];
$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];
$ip = $_POST["ip"];
$visualizacao = $_POST["visualizacao"];


//Gravando o nome do arquivo de imagem no bd   
$img1Nome = $img1['name'];  
$img1ThumbNome = $img1Thumb['name'];
    
//Ele que faz o limite da imagem   
//Upload das imagens
set_time_limit(0);
$diretorio = "imagens/upload";
  
// capturando o arquivo e imagem
$id_img1 = "img1";
$img1Nome = $_FILES[$id_img1]["name"];
$img1Temp = $_FILES[$id_img1]["tmp_name"]; //TMP_NAME é aonde fica o arquivo quando vc copia ele 
move_uploaded_file($img1Temp, "$diretorio/$img1Nome");
    
$id_img1Thumb = "img1Thumb";
$img1ThumbNome = $_FILES[$id_img1Thumb]["name"];
$img1ThumbTemp = $_FILES[$id_img1Thumb]["tmp_name"];
move_uploaded_file($img1ThumbTemp, "$diretorio/$img1ThumbNome");
    
    
//Inserir registro
$inserir = "INSERT INTO tb_cursos (idCurso, dataCad, idArea, titulo, subtitulo, descricao, publicoAlvo, cargaHoraria, preRequisito, horario, ead, vagas, certificacao, valor, img1, img1Thumb, video, home, ativo, cep, latitude, longitude, ip, visualizacao) VALUES (NULL, current_timestamp(), '$idArea', '$titulo', '$subtitulo', '$descricao', '$publicoAlvo', '$cargaHoraria', '$preRequisito', '$horario', '$ead', '$vagas', '$certificacao', '$valor', '$img1Nome', '$img1ThumbNome', '$video', '$home', '$ativo', '$cep', '$latitude', '$longitude', '$ip', '$visualizacao')";

//executar inserir
$resultado = mysqli_query($conn_bd_ctec, $inserir);

//echo $resultado;
//var_dump($resultado);


// Verificar se deu certo o resultado de inserir e redirecionar para a lista
if($resultado == TRUE){
    echo('<script> alert("Dados inseridos com sucesso!!")
    window.location.href="adm-lista.php";</script');
} else{
         ("Falha ao inserir dados!");
      };



};
?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inserir Registro - Administração do Site</title>
</head>

 <form method="post" enctype="multipart/form-data" id="form_inserir">
     
<input name="idCurso" type="hidden" id="idCurso"> <br> <br>

 <input name="dataCad" type="hidden" id="dataCad"> <br> <br>
     
Id Área: 
<select name="idArea" required="required" id="idArea" >
     <option></option>
   <?php do { ?>
    <option  value=" <?php echo($row_rs_area['idArea']); ?>"><?php echo($row_rs_area['area']); ?></option>
     <?php } while($row_rs_area = mysqli_fetch_assoc($rs_area)); ?>
</select>
    	
     <br><br>
     
Titulo do Curso: <input name="titulo" type="text" required="required" id="titulo" size="100"> <br> <br> 

subtitulo do Curso: <input name="subtitulo" type="text" id="subtitulo" size="100"> <br> <br>   
  
descricão do Curso:<textarea name="descricao" id="descricao" cols="60"></textarea> <br> <br>  
    
Publico Alvo: <input name="publicoAlvo" type="text" id="publicoAlvo" size="100"> <br> <br> 
     
Carga horaria: <input name="cargaHoraria" type="number" id="cargaHoraria" max="1600" min="0"> <br> <br>
     
Pre-requisito: <input name="preRequisito" type="text" id="preRequisito" size="100"> <br> <br>
     
horario: <input name="horario" type="text" id="horario" size="100"> <br> <br>
     
EAD:   <input name="ead" type="hidden" value="0"> <br> <br>
   <input name="ead" type="checkbox" value="1" checked="checked"> <br>
     
Vagas: <input name="vagas" type="number" id="vagas" size="15"> <br> <br>
     
certificação:   <input name="certificacao" type="hidden" value="0"> <br> <br>
   <input name="certificacao" type="checkbox" value="1" checked="checked"> <br>
    
Valor: <input name="valor" type="number" id="valor" size="15"> <br> <br>

Imagem: <input name="img1" type="file" id="img1" size="100"> <br> <br>

Imagem Thumb: <input name="img1Thumb" type="file" id="img1Thumb" size="100"> <br> <br>

Video: <input name="video" type="text" id="video" size="100"> <br> <br>
     
Home:<input name="home" type="hidden" value="0"> <br> <br>
   <input name="home" type="checkbox" value="1" checked="checked"> <br>
     
Ativo:   <input name="ativo" type="hidden" value="0"> <br> <br>
   <input name="ativo" type="checkbox" value="1" checked="checked"> <br>
     
 <input name="cep" type="hidden" id="cep"  placeholder="00000-000" maxlength="9">
     
 <input name="latitude" type="hidden" id="latitude" size="100"> <br> <br>
     
 <input name="longitude" type="hidden" id="longitude" size="100"> <br> <br>

 <input name="ip" type="hidden" id="ip" size="100"> <br> <br>
     
 <input name="visualizacao" type="hidden" id="visualizacao" min="0" value="0"> <br>








   <input type="submit">

</form>   
    
  <!-- Libera a memória associada ao seu resultado da consulta ao bd  
<?php 
mysqli_free_result($rs_area);

//Fechar a conexão
mysqli_close($conn_bd_ctec);
?>
    
    
<body>
</body>
</html>