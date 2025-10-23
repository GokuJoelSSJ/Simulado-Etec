<?php
session_start();
require __DIR__ . '/../conexao.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->query("SELECT id, titulo FROM simulados ORDER BY id");
$simulados = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Simulados ETEC</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: url('https://gazetadebebedouro.com.br/wp-content/uploads/62d3efe37ac3f1d3d26a13f0dd4cd5a0_XL.jpg') no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.card {
    max-width: 600px;
    width: 100%;
    background: rgba(255,255,255,0.95);
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}
h1 {
    color: #A52A2A; /* vermelho bordo */
    margin-bottom: 20px;
    text-align: center;
}
label {
    color: #A52A2A;
    font-weight: bold;
}
.btn-success {
    background-color: #A52A2A;
    border-color: #A52A2A;
}
.btn-success:hover {
    background-color: #B23333;
    border-color: #B23333;
}
.btn-voltar {
    background-color: #A52A2A;
    border-color: #A52A2A;
    color: #fff; /* Texto branco */
    padding: 6px 12px;
    font-size: 0.9rem;
    text-align: center;
    text-decoration: none;
}
.btn-voltar:hover {
    background-color: #B23333;
    border-color: #B23333;
}
.flex-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
</head>
<body>
<div class="card">
    <h1>Simulados</h1>

    <form action="process_form_sql.php" method="POST">

        <div class="mb-3">
            <label for="simulado_id">Escolha um simulado existente:</label>
            <select name="simulado_id" id="simulado_id" class="form-select">
                <option value="">-- Selecione --</option>
                <?php foreach($simulados as $s): ?>
                    <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['titulo']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="novo_simulado">Ou crie um novo simulado:</label>
            <input type="text" name="novo_simulado" id="novo_simulado" class="form-control" placeholder="Ex: Simulado 2025">
        </div>

        <div class="mb-3">
            <label for="id">ID da Questão (vazio para nova):</label>
            <input type="number" name="id" id="id" class="form-control" placeholder="Ex: 1">
        </div>

        <div class="mb-3">
            <label for="enunciado">Enunciado:</label>
            <textarea name="enunciado" id="enunciado" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="materia">Matéria:</label>
            <input type="text" name="materia" id="materia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alternativas:</label>
            <input type="text" name="alternativas[A]" class="form-control mb-2" placeholder="A" required>
            <input type="text" name="alternativas[B]" class="form-control mb-2" placeholder="B" required>
            <input type="text" name="alternativas[C]" class="form-control mb-2" placeholder="C" required>
            <input type="text" name="alternativas[D]" class="form-control" placeholder="D" required>
        </div>

        <div class="mb-4">
            <label for="resposta_correta">Resposta Correta:</label>
            <select name="resposta_correta" id="resposta_correta" class="form-select" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>

        <div class="flex-buttons">
            <a href="../admin.php" class="btn btn-voltar">← Voltar</a>
            <button type="submit" class="btn btn-success">Salvar Questão</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
