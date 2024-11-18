<?php
require_once 'usuario.php';
$usuario = new Usuario();
$usuario->conectar("cadastroturma32", "localhost", "root", "");
if ($usuario->msgError != "") {
    die("Erro de conexão: " . $usuario->msgError);
}

$usuarios = $usuario->listarUsuarios(); // Obtém a lista de usuários

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Privada</title>
</head>
<body>
    <h2>Usuários Cadastrados</h2>
    <?php
    if (!empty($usuarios) && is_array($usuarios)) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th></tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>" . $usuario['id_usuario'] . "</td>";
            echo "<td>" . $usuario['nome'] . "</td>";
            echo "<td>" . $usuario['telefone'] . "</td>";
            echo "<td>" . $usuario['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }
    ?>
</body>
</html>
