<?php
require_once 'usuario.php';
$usuario = new Usuario();
$usuario->conectar("cadastroturma32", "localhost", "root", "");

if ($usuario->msgError != "") {
    echo "Erro na conexão: " . $usuario->msgError;
    exit;
}

$usuarios = $usuario->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Lista de Usuários Cadastrados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Edição</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($usuarios) > 0): ?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?php echo $u['id_usuario']; ?></td>
                        <td><?php echo $u['nome']; ?></td>
                        <td><?php echo $u['telefone']; ?></td>
                        <td><?php echo $u['email']; ?></td>
                        <td><a href="editar.php?id=<?= $u['id_usuario'] ?>">Editar</a> |
                            <a href="excluir.php?id=<?= $u['id_usuario'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a></td>
                    </tr>
                    
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Nenhum usuário cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div style="text-align: center;">
    <button><a href="index.php"Voltar</a>Voltar</button>
    </div>
</body>
</html>

