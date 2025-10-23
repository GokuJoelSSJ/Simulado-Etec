<?php
session_start();

if (isset($_SESSION['usuario'])) {
    if ($_SESSION['tipo'] === 'professor') {
        header('Location: admin.php');
    } else {
        header('Location: provas.php');
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Simulado</title>
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
        max-width: 400px;
        width: 100%;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.95);
    }
    .card-body {
        padding: 2rem;
    }
    h2 {
        font-size: 1.8rem;
        font-weight: 700;
    }
    button {
        font-size: 1.1rem;
        padding: 0.75rem 1rem;
    }
  </style>
</head>
<body>

<div class="card shadow-lg">
  <div class="card-body">
    <h2 class="text-danger text-center mb-4">Login no Simulado</h2>

    <form method="POST" action="valida_login.php">
      <div class="mb-3">
        <label for="rm" class="form-label fw-bold">RM (Código ou Email):</label>
        <input type="text" id="rm" name="rm" class="form-control form-control-lg" required>
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label fw-bold">Senha:</label>
        <input type="password" id="senha" name="senha" class="form-control form-control-lg" required>
      </div>

      <button type="submit" class="btn btn-danger w-100">Entrar</button>
    </form>

    <hr class="my-4">

    <p class="text-center">
      Não tem uma conta? <a href="criar_conta.php" class="text-danger fw-bold">Crie uma aqui</a>
    </p>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
