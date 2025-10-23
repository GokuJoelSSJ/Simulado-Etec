<?php
session_start();
require __DIR__ . '/../conexao.php';

$simulado_id = (int)($_POST['simulado_id'] ?? 0);
$novo_simulado = trim($_POST['novo_simulado'] ?? '');
$id = $_POST['id'] ?? null;
$enunciado = $_POST['enunciado'] ?? '';
$materia = $_POST['materia'] ?? '';
$resposta_correta = $_POST['resposta_correta'] ?? '';
$alternativas = $_POST['alternativas'] ?? [];

// Se for novo simulado
if ($novo_simulado) {
    $stmt = $pdo->prepare("INSERT INTO simulados (titulo) VALUES (:titulo)");
    $stmt->execute(['titulo' => $novo_simulado]);
    $simulado_id = $pdo->lastInsertId();
}

// Se não tem simulado selecionado, erro
if (!$simulado_id) {
    die("Erro: selecione ou crie um simulado.");
}

if ($id) {
    // Atualiza questão existente
    $stmt = $pdo->prepare("UPDATE questoes SET enunciado=:enunciado, resposta_correta=:resposta, materia=:materia WHERE id=:id");
    $stmt->execute([
        'enunciado'=>$enunciado,
        'resposta'=>$resposta_correta,
        'materia'=>$materia,
        'id'=>$id
    ]);

    foreach($alternativas as $letra=>$texto){
        $stmt_alt = $pdo->prepare("UPDATE alternativas SET texto=:texto WHERE questao_id=:qid AND letra=:letra");
        $stmt_alt->execute([
            'texto'=>$texto,
            'qid'=>$id,
            'letra'=>$letra
        ]);
    }
} else {
    // Cria nova questão
    $stmt = $pdo->prepare("INSERT INTO questoes (simulado_id, enunciado, resposta_correta, materia) VALUES (:simulado, :enunciado, :resposta, :materia)");
    $stmt->execute([
        'simulado'=>$simulado_id,
        'enunciado'=>$enunciado,
        'resposta'=>$resposta_correta,
        'materia'=>$materia
    ]);
    $questao_id = $pdo->lastInsertId();

    foreach($alternativas as $letra=>$texto){
        $stmt_alt = $pdo->prepare("INSERT INTO alternativas (questao_id, letra, texto) VALUES (:qid, :letra, :texto)");
        $stmt_alt->execute([
            'qid'=>$questao_id,
            'letra'=>$letra,
            'texto'=>$texto
        ]);
    }
}

header("Location: index1.php");
exit;
