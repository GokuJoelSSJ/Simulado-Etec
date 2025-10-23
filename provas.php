<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->query("SELECT id, titulo FROM simulados ORDER BY id DESC");
$simulados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Simulador de Provas ETEC</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/1/2020/10/Bebedouro-Etec-Bebedouro-02-scaled.jpg') no-repeat center center fixed;
        background-size: cover;
    }
    .card {
        max-width: 500px;
        width: 100%;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.95);
    }
    .card-body {
        padding: 2rem;
    }
    h1 {
        font-size: 1.8rem;
        font-weight: 700;
    }
    button, a.btn {
        font-size: 1.1rem;
        padding: 0.75rem 1rem;
    }
</style>
</head>
<body>

<div class="card shadow-lg">
    <div class="card-body">
        <h1 class="text-danger text-center mb-4">Simulador de Provas ETEC</h1>
        <p class="text-center">Bem-vindo(a), <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>!</p>

        <form action="simulado.php" method="GET" class="mt-4">
            <div class="mb-3">
                <label for="simulado_id" class="form-label fw-bold">Selecione o simulado:</label>
                <select name="simulado_id" id="simulado_id" class="form-select form-select-lg" required>
                    <option value="">-- Selecione um Simulado --</option>
                    <?php foreach ($simulados as $simulado): ?>
                        <option value="<?= $simulado['id'] ?>"><?= htmlspecialchars($simulado['titulo']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger w-100">Iniciar Simulado</button>
        </form>

        <hr class="my-4">

        <div class="text-center">
            <a href="logout.php" class="btn btn-danger w-50">Sair</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
