
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
    
         
     
<!-- Conteúdo -->     
<div class="container-fluid">
  
<div class="alert alert-primary" role="alert" style="text-align: center">
<h2>Fale conosco</h2>
</div>    

    <form action="?acao=enviar" method="post" enctype="multipart/form-data" id="form1" style="padding:10px">

<div class="form-group">
<label><strong>Nome</strong>:*</label>
<input name="nome" type="text" required="required" class="form-control">
</div>

<div class="form-group">
<label><strong>E-mail</strong>:*</label>
<input name="email" type="email" required="required" class="form-control">
</div>

<div class="form-group">
<label><strong>Telefone</strong>:</label>
<input name="telefone" type="tel" class="form-control">
</div>
  
<div class="form-group">
<label><strong>Assunto</strong>:*</label>
<input name="assunto" type="text" required="required" class="form-control">
</div>
 
  
<div class="form-group">
<label><strong>Mensagem</strong>:*</label>
<textarea name="mensagem" rows="10" required class="form-control"></textarea>
</div>

<div class="form-group">
<label><strong>Anexo</strong>:</label>
<input name="arquivo" type="file" class="form-control-file">
</div>

<br>
<button type="submit" class="btn btn-primary">Enviar mensagem</button>
<br><br>

</form>

<?php
require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';

$mailer = new PHPMailer;
$mailer->isSMTP(); // Set mailer to use SMTP
$mailer->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

if($_GET['acao'] == 'enviar'){
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$arquivo = $_FILES["arquivo"];

$mailer->Host = 'plesk12l0002.hospedagemdesites.ws';
$mailer->SMTPAuth = true;     // Enable SMTP authentication
$mailer->IsSMTP();
$mailer->isHTML(true);       // Set email format to HTML
$mailer->Port = 587;

// Ativar condição caracteres
$mailer->CharSet = 'UTF-8';

// Dados da sua conta do provedor de hospedagem para autenticação e envio
$usuario = 'ti38@sandromir.com';
$senha = 'Ti382024!!';
$seuEmail = 'ti38@sandromir.com';

// Conta do usuário
$mailer->Username = $usuario; // SMTP username
$mailer->Password = $senha;    // SMTP password

// E-mail do destinatario
$address = $seuEmail;

// Corpo do e-mail em html
$corpoMSG = "<strong>Nome:</strong> $nome <br><br> <strong>E-mail:</strong> $email <br><br> <strong>Telefone:</strong> $telefone <br><br> <strong>Assunto:</strong> $assunto <br><br> <strong>Mensagem:</strong> $mensagem <br><br>";

$mailer->AddAddress($address, "destinatario");
$mailer->Sender = $seuEmail;
$mailer->FromName = $nome;
$mailer->From = $email;

// assunto da mensagem
$mailer->Subject = $assunto;

// corpo da mensagem
$mailer->MsgHTML($corpoMSG);

// anexar arquivo no máximo 2MB
$mailer->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );

if(!$mailer->Send()) {
   echo "Erro: " . $mailer->ErrorInfo;
  } else {
   echo('<script> alert("Mensagem enviada com sucesso!"); window.location.href="index.php"; </script>');

  }
}
?>

    
    
    
    
    

</div>
 

    
    
</div>
<!-- Rodapé -->     
<?php include("_rodape.php"); ?>    
<!-- FIM Rodapé -->          
     
</main>  

<!-- Complementos --> 
<?php include("_complementos.php"); ?>   
<!-- FIM Complementos -->
	

</body>
</html>
