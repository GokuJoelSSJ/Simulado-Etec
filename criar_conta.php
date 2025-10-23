<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Criar Conta - Simulado</title>
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
    <h2 class="text-danger text-center mb-4">Criar Conta no Simulado</h2>
    <form method="POST" action="salvar_usuario.php">
      <div class="mb-3">
        <label class="form-label fw-bold">Nome de Usuário:</label>
        <input type="text" name="usuario" class="form-control form-control-lg" required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Você é aluno ou professor?</label>
        <select name="tipo" id="tipo_usuario" class="form-select form-select-lg" required>
          <option value="aluno" selected>Aluno</option>
          <option value="professor">Professor</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Email ou RM:</label>
        <input type="text" name="rm" class="form-control form-control-lg" required>
      </div>

      <div class="mb-3" id="campo_codigo_escola" style="display: none;">
        <label class="form-label fw-bold">Código de Professor:</label>
        <input type="text" name="codigo_escola" class="form-control form-control-lg">
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Senha:</label>
        <input type="password" name="senha" class="form-control form-control-lg" required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Telefone:</label>
        <input type="tel" name="telefone" placeholder="(XX) XXXXX-XXXX" class="form-control form-control-lg" required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Como você descobriu o site?</label>
        <textarea name="descoberta" rows="3" class="form-control" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Motivo de querer entrar:</label>
        <textarea name="motivo" rows="3" class="form-control" required></textarea>
      </div>

      <button type="submit" class="btn btn-danger w-100">Criar Conta</button>
    </form>

    <hr class="my-4">

    <p class="text-center">
      Já tem uma conta? <a href="provas.php" class="text-danger fw-bold">Faça login aqui</a>
    </p>
    <p class="text-center">
      Voltar para <a href="index.php" class="text-danger fw-bold">Página Inicial</a>
    </p>
  </div>
</div>

<script>
  document.getElementById('tipo_usuario').addEventListener('change', function () {
    var campoCodigoEscola = document.getElementById('campo_codigo_escola');
    var inputCodigoEscola = campoCodigoEscola.querySelector('input');
    if (this.value === 'professor') {
      campoCodigoEscola.style.display = 'block';
      inputCodigoEscola.required = true;
    } else {
      campoCodigoEscola.style.display = 'none';
      inputCodigoEscola.required = false;
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
