<?php
require_once 'usuario.php';
$usuario = new Usuario();

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Conecta ao banco de dados
    $usuario->conectar("cadastroturma32", "localhost", "root", "");

    // Busca os dados no banco p editar
    global $pdo; // Torne o PDO acessível
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
    $sql->bindValue(":id", $id_usuario);
    $sql->execute();
    
    $usuario_data = $sql->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Atualiza os dados no banco 
    $usuario->editar($id_usuario, $nome, $telefone, $email, $senha);

    echo "Usuário atualizado com sucesso!";
    header("Location: areaPrivada.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="" method="post">
        <label>Nome</label>
        <input type="text" name="nome" value="<?= $usuario_data['nome'] ?>" required><br><br>

        <label>Telefone</label>
        <input type="text" name="telefone" value="<?= $usuario_data['telefone'] ?>" required><br><br>

        <label>Email</label>
        <input type="email" name="email" value="<?= $usuario_data['email'] ?>" required><br><br>

        <label>Senha</label>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Atualizar">
    </form>
    <a href="areaPrivada.php">Voltar</a>
</body>
</html>
