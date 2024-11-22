<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>
</head>
<body>
    <h2>CRUD - CREATE READ UPDATE DELETE</h2>
    <h3>Tela login</h3>
    <form action="areaPrivada.php" method="post">
        <label> Usuário: </label>
        <input type="email" name="email" id="" placeholder="Digite seu email." required>
        <label>Senha</label>
        <input type="password" name="senha" id="" placeholder="Digite sua senha."required>
        <input type="submit" value="LOGAR">
        <a href="cadastro.php">CADASTRE-SE</a>
    </form>
    <?php if (!empty($msgErro)): ?>
        <p class="error"><?php echo $msgErro; ?></p>
    <?php endif; ?>
</body>
</html>