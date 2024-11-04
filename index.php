<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>
</head>
<body>
    <h2>CRUD - CREATE READ UPDATE</h2>
    <h3>Tela login</h3>
    <form  method="post">
        <label> Usuário: </label>
        <input type="email" name="email" id="" placeholder="Digite seu email." >

        <label>Senha</label>
        <input type="password" name="senha" id="" placeholder="Digite sua senha.">
        <input type="submit" value="LOGAR">
        <a href="cadastro.php">CADASTRE-SE</a>
    </form>
    <?php
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if(!empty($email)&& !empty($senha))
            {
                $usuario->conectar("cadastroturma32","localhost","root","");
                if($usuario->msgError =="")
                {
                    if($usuario->logar($email,$senha))
                    {
                        header("location:areaPrivada.php");
                    }
                    else
                {
                    ?>
                        <div id="msn-sucesso-cad">
                        Email e/ou senha incorretos
                        </div>
                    <?php 
                }
                }
                else
                {
                    ?>
                        <div id="msn-sucesso">
                        <?php echo "Erro: ".$usuario->msgError;?>
                        </div>
                    <?php 
                }
                
               
            }
            else
            {
                    ?>
                        <div id="msn-sucesso">
                            Preencha todos os campos!
                        </div>
                    <?php
            }
                    
        }
    ?>

</body>
</html>