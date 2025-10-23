<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['questoes']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: provas.php');
    exit;
}

$questoes = $_SESSION['questoes'];
$respostas_usuario = $_POST['respostas'] ?? [];

$total_acertos = 0;
$total_questoes = count($questoes);
$resultados_finais = [];
$acertos_por_materia = [];
$total_por_materia = [];

foreach ($questoes as $q) {
    $id = $q['id'];
    $materia = $q['materia'];
    $resposta_correta = $q['resposta_correta'];
    $resposta_enviada = $respostas_usuario[$id] ?? null;

    if (!isset($total_por_materia[$materia])) {
        $total_por_materia[$materia] = 0;
        $acertos_por_materia[$materia] = 0;
    }
    $total_por_materia[$materia]++;
    $acertou = ($resposta_enviada === $resposta_correta);
    if ($acertou) $total_acertos++;
    if ($acertou) $acertos_por_materia[$materia]++;

    $resultados_finais[] = [
        'enunciado' => $q['enunciado'],
        'materia' => $materia,
        'resposta_enviada' => $resposta_enviada,
        'acertou' => $acertou,
    ];
}

unset($_SESSION['questoes']);
unset($_SESSION['simulado_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Resultado do Simulado</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: url('https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/1/2020/10/60953_etec_bebedouro_diogo_-moreira.jpg') no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    padding: 20px;
}
.container {
    max-width: 900px;
    margin: auto;
}
.resultado-geral, .desempenho-materia, .gabarito {
    background: rgba(255, 255, 255, 0.9);
    padding: 1.5rem;
    margin-bottom: 20px;
    border-radius: 10px;
}
h1, h2 {
    color: #8B0000; /* vermelho bordo */
    margin-bottom: 15px;
}
.questao-resultado {
    padding: 12px;
    margin-bottom: 12px;
    border-radius: 8px;
    border-left-width: 5px;
    border-left-style: solid;
}
.questao-resultado.certa {
    border-left-color: #0000FF; /* azul vivo */
    background-color: rgba(0, 0, 255, 0.2); /* fundo azul opaco */
}
.questao-resultado.errada {
    border-left-color: #FF0000; /* vermelho vivo */
    background-color: rgba(255, 0, 0, 0.2); /* fundo vermelho opaco */
}
.questao-resultado .status {
    font-weight: bold;
}
.certa .status { color: #0000FF; }
.errada .status { color: #FF0000; }
.btn-voltar {
    display: block;
    width: 100%;
    padding: 12px;
    font-size: 1.1rem;
    text-align: center;
    background-color: #8B0000; /* vermelho bordo */
    color: #fff;
    border: none;
    border-radius: 5px;
}
.btn-voltar:hover {
    background-color: #a30000;
}
</style>
</head>
<body>
<div class="container">
<h1 class="text-center mb-4">Resultado do Simulado</h1>

<div class="resultado-geral">
    <h2>Desempenho Geral</h2>
    <p>Você acertou <strong><?= $total_acertos ?></strong> de <strong><?= $total_questoes ?></strong> questões.</p>
    <?php $percentual = ($total_questoes > 0) ? ($total_acertos / $total_questoes) * 100 : 0; ?>
    <p><strong>Percentual de acerto: <?= number_format($percentual, 2, ',', '.') ?>%</strong></p>
</div>

<div class="desempenho-materia">
    <h2>Desempenho por Matéria</h2>
    <ul class="list-group list-group-flush">
        <?php foreach ($total_por_materia as $materia => $total): ?>
            <li class="list-group-item">
                <strong><?= htmlspecialchars($materia) ?>:</strong>
                <?= $acertos_por_materia[$materia] ?? 0 ?> de <?= $total ?> acertos.
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="gabarito">
    <h2>Gabarito</h2>
    <?php foreach ($resultados_finais as $index => $res): ?>
        <div class="questao-resultado <?= $res['acertou'] ? 'certa' : 'errada' ?>">
            <p><strong>Questão <?= $index + 1 ?> (<?= htmlspecialchars($res['materia']) ?>):</strong> <?= htmlspecialchars(substr($res['enunciado'],0,80)) ?>...</p>
            <p>Sua resposta: <strong><?= htmlspecialchars($res['resposta_enviada'] ?? 'Não respondida') ?></strong> - <span class="status"><?= $res['acertou'] ? 'Correta!' : 'Errada!' ?></span></p>
        </div>
    <?php endforeach; ?>
</div>

<a href="provas.php" class="btn btn-voltar">Fazer outro simulado</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
