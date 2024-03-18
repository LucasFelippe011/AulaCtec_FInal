<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Conversão de senha para md5 criptografia</title>
</head>

<body>
    
    <?php 
    $senha = "123";
    
    echo md5($senha);

    ?>
<form method="post">
Senha: <input name="senha" type="password" id="senha" maxlength="40"> 
    <br> <br>
    <input type="submit">
 
    <?php                     
    if(isset($_POST["senha"])){
        $senha = $_POST["senha"];
         $senha = md5("$senha");
        echo($senha);
    };
    
    ?>
    <br><br> <br><br><br><br><br><br><br><br><br><br><br>
    
    <form method="post">
        
        Senha: <input name="senha" type="password" required="required" id="senha" maxlength="32">
        
        <input type="submit">
    <?php 
    $strSenha = "202cb962ac59075b964b07152d234b70"; // 123 no BD 
    $senha = md5($_POST["senha"]);
               
    if(isset($_POST["senha"])){
        
        if($strSenha == $senha){
            echo("Senha certo");
        } else{
            echo("Senha errada");
        };
        
    };
               
    
               
               
               
    ?>
    
    
    
    </form>
    
    
    
    
    
</form>    
    
    
</body>
</html>