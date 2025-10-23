<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'conexao.php';

    $usuario = $_POST['usuario'];
    $tipo = $_POST['tipo'];
    $rm_base = $_POST['rm'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'] ?? null;
    $descoberta = $_POST['descoberta'] ?? null;
    $motivo = $_POST['motivo'] ?? null;

    $rm_final = $rm_base;
    if ($tipo === 'professor' && !empty($_POST['codigo_escola'])) {
        $rm_final .= $_POST['codigo_escola'];
    }

    // Insere no banco
    $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, RM, senha, tipo, telefone, descoberta_site, motivo_entrada)
        VALUES (:usuario, :rm, :senha, :tipo, :telefone, :descoberta, :motivo)");
    $stmt->execute([
        'usuario' => $usuario,
        'rm' => $rm_final,
        'senha' => $senha,
        'tipo' => $tipo,
        'telefone' => $telefone,
        'descoberta' => $descoberta,
        'motivo' => $motivo
    ]);

    session_start();
    $_SESSION['mensagem'] = "Conta criada com sucesso! Você já pode fazer o login.";
    header('Location: provas.php');
    exit;
}
?>
