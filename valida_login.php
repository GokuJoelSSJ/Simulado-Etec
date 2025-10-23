<?php
session_start();
require 'conexao.php';

$rm = $_POST['rm'];
$senha = $_POST['senha'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE RM = :rm LIMIT 1");
$stmt->execute(['rm' => $rm]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && $usuario['senha'] === $senha) { // em produção, usar password_verify se hash
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['rm'] = $usuario['RM'];
    $_SESSION['tipo'] = $usuario['tipo'];

    if ($usuario['tipo'] === 'professor') {
        header("Location: admin.php");
    } else {
        header("Location: provas.php");
    }
    exit;
} else {
    echo "RM ou senha inválidos.";
}
?>
