<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== "professor") {
    die("Acesso negado!");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área do Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://gazetadebebedouro.com.br/wp-content/uploads/62d3efe37ac3f1d3d26a13f0dd4cd5a0_XL.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container-professor {
            max-width: 500px;
            background: rgba(255,255,255,0.95);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #A52A2A; /* vermelho bordo */
            margin-bottom: 20px;
        }
        a.btn-action {
            display: block;
            margin: 10px 0;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 6px;
            text-decoration: none;
            color: #fff;
        }
        a.logout {
            background-color: #A52A2A; /* vermelho bordo */
        }
        a.logout:hover {
            background-color: #B23333;
        }
        a.btn-action.create-edit {
            background-color: #3f7197ff; /* azul bordo suave */
        }
        a.btn-action.create-edit:hover {
            background-color: #66a1c4ff;
        }
    </style>
</head>
<body>
    <div class="container container-professor">
        <h1>Área do Professor</h1>
        <p>Bem-vindo, <strong><?= htmlspecialchars($_SESSION['usuario']); ?></strong>!</p>
        <a href="criacao/index1.php" class="btn-action create-edit">Criar ou Editar Questões</a>
        <a href="logout.php" class="btn-action logout">Sair</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
