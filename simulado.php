<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['simulado_id'])) {
    $simulado_id = (int)$_GET['simulado_id'];
    if (!$simulado_id) die("Simulado não informado.");

    $stmt = $pdo->prepare("
        SELECT q.id AS questao_id, q.enunciado, q.resposta_correta, q.materia,
               a.letra, a.texto
        FROM questoes q
        LEFT JOIN alternativas a ON q.id = a.questao_id
        WHERE q.simulado_id = :simulado
        ORDER BY q.id, a.letra
    ");
    $stmt->execute(['simulado' => $simulado_id]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $questoes = [];
    foreach ($rows as $row) {
        $qid = $row['questao_id'];
        if (!isset($questoes[$qid])) {
            $questoes[$qid] = [
                'id' => $qid,
                'enunciado' => $row['enunciado'],
                'resposta_correta' => $row['resposta_correta'],
                'materia' => $row['materia'],
                'alternativas' => []
            ];
        }
        $questoes[$qid]['alternativas'][$row['letra']] = $row['texto'];
    }

    $_SESSION['questoes'] = $questoes;
    $_SESSION['simulado_id'] = $simulado_id;
}

if (empty($_SESSION['questoes'])) {
    die("Nenhuma questão encontrada para este simulado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Simulado</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: url('https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/1/2020/10/60953_etec_bebedouro_diogo_-moreira.jpg') no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    padding: 20px;
}
.container {
    max-width: 800px;
    margin: auto;
}
.questao {
    background: rgba(255, 255, 255, 0.95);
    padding: 1.5rem;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.questao h3 {
    color: #b22222; /* vermelho bordo */
}
.alternativas label {
    display: block;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.2s;
}
.alternativas input[type="radio"] {
    margin-right: 10px;
}
.alternativas label:hover {
    background-color: rgba(178, 34, 34, 0.1);
}
button[type="submit"] {
    width: 100%;
    padding: 12px;
    font-size: 1.1rem;
}
</style>
</head>
<body>
<div class="container">
<h1 class="text-center mb-4" style="color:#b22222;">Simulado</h1>
<form action="resultado.php" method="POST">
<?php foreach ($_SESSION['questoes'] as $index => $q): ?>
    <div class="questao">
        <h3>Questão <?= $index+1 ?> (<?= htmlspecialchars($q['materia']) ?>)</h3>
        <p><?= htmlspecialchars($q['enunciado']) ?></p>
        <div class="alternativas">
        <?php foreach ($q['alternativas'] as $letra => $texto): ?>
            <label>
                <input type="radio" name="respostas[<?= $q['id'] ?>]" value="<?= $letra ?>" required>
                <?= $letra ?> - <?= htmlspecialchars($texto) ?>
            </label>
        <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
<button type="submit" class="btn btn-danger">Enviar Respostas</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
