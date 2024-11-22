<?php
require_once 'usuario.php';
$usuario = new Usuario();

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Conecta ao banco 
    $usuario->conectar("cadastroturma32", "localhost", "root", "");

    // Exclui o usuario no banco de dados
    $usuario->excluir($id_usuario);

    echo "Usuário excluído com sucesso!";
    header("Location: areaPrivada.php"); // vai para a area privada
}
?>
