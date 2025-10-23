<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../conexao.php';

    $id = (int)($_POST['id'] ?? 0);
    $resposta = $_POST['resposta'] ?? '';

    // Busca questão no banco
    $stmt = $pdo->prepare("SELECT resposta_correta FROM questoes WHERE id=:id");
    $stmt->execute(['id'=>$id]);
    $questao = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$questao) {
        die("Erro: questão não encontrada.");
    }

    $feedback = ($resposta === $questao['resposta_correta'])
        ? "Resposta correta!"
        : "Resposta incorreta. A resposta correta é: " . $questao['resposta_correta'];

    // Aqui você pode redirecionar ou mostrar feedback
    echo $feedback;
}
?>
