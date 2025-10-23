<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Simulado ETEC - Início</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --bordo: #7b1f27;
      --bordo-escuro: #5a1319;
      --cinza: #d9d9d9;
      --cinza-escuro: #555;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
      color: #333;
    }

    /* Navbar */
    .navbar {
      background-color: var(--bordo);
    }
    .navbar a {
      color: #fff !important;
      font-weight: 500;
    }
    .navbar a:hover {
      color: var(--cinza) !important;
    }

    /* Header */
    header {
      background: linear-gradient(rgba(123,31,39,0.7), rgba(123,31,39,0.7)), 
                  url('https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/1/2020/10/Bebedouro-Etec-Bebedouro-02-scaled.jpg') no-repeat center center fixed;
      background-size: cover;
      color: white;
      padding: 150px 20px;
      text-align: center;
      animation: fadeIn 1.5s ease;
    }
    header h1 {
      font-weight: 700;
      font-size: 3rem;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.4);
    }
    header p {
      font-size: 1.2rem;
    }

    /* Botão principal */
    .btn-bordo {
      background-color: var(--bordo);
      color: #fff;
      border: none;
      font-weight: 600;
    }
    .btn-bordo:hover {
      background-color: var(--bordo-escuro);
      color: #fff;
    }

    /* Seções */
    section {
      padding: 80px 0;
    }
    section h2 {
      color: var(--bordo);
      font-weight: 700;
      text-align: center;
      margin-bottom: 40px;
    }

    /* Cards */
    .info-card {
      background: rgba(255,255,255,0.95);
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.2);
    }
    .info-card i {
      font-size: 2.5rem;
      color: var(--bordo);
      margin-bottom: 15px;
    }

    /* Footer */
    footer {
      background: linear-gradient(90deg, var(--bordo), var(--bordo-escuro));
      color: white;
      text-align: center;
      padding: 20px;
    }

    /* Animação */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Simulado ETEC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNav" class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="#">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="#etec">Por que a ETEC?</a></li>
        <li class="nav-item"><a class="nav-link" href="#simulado">Sobre o Simulado</a></li>
        <li class="nav-item"><a class="nav-link" href="criar_conta.php">Fazer Prova</a></li>
        <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HEADER -->
<header>
  <div class="container">
    <h1>Bem-vindo ao Simulado ETEC</h1>
    <p class="lead">Prepare-se para o Vestibulinho com prática, confiança e estratégia!</p>
    <a href="criar_conta.php" class="btn btn-bordo btn-lg mt-3 shadow">Fazer Simulado Agora</a>
  </div>
</header>

<!-- POR QUE ESTUDAR NA ETEC -->
<section id="etec">
  <div class="container">
    <h2>Por que estudar na ETEC?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 text-center info-card">
          <i class="bi bi-mortarboard-fill"></i>
          <h4>Ensino de Qualidade</h4>
          <p>A ETEC é reconhecida em todo o estado de São Paulo por oferecer ensino técnico e médio de excelência, com professores qualificados e estrutura moderna.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 text-center info-card">
          <i class="bi bi-briefcase-fill"></i>
          <h4>Oportunidades Reais</h4>
          <p>Alunos da ETEC têm destaque no mercado de trabalho e acesso facilitado a estágios, parcerias e programas de empresas de renome.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 text-center info-card">
          <i class="bi bi-people-fill"></i>
          <h4>Ambiente Colaborativo</h4>
          <p>Projetos, feiras, competições e atividades práticas fazem parte da rotina, estimulando o trabalho em equipe e a criatividade.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SOBRE O SIMULADO -->
<section id="simulado" class="bg-light">
  <div class="container">
    <h2>Por que fazer o Simulado?</h2>
    <div class="row align-items-center">
      <div class="col-md-6">
        <p class="lead">Nosso simulador de provas foi desenvolvido para ajudar você a se preparar de forma eficiente para o Vestibulinho da ETEC.</p>
        <p>Com questões atualizadas e feedback automático, o simulado ajuda a identificar seus pontos fortes e fracos, melhora a gestão do tempo e aumenta suas chances de aprovação.</p>
        <p>Ao praticar frequentemente, você ganha mais confiança e domina o formato das questões, tornando o estudo mais leve e eficaz.</p>
        <a href="criar_conta.php" class="btn btn-bordo btn-lg mt-3">Fazer o Simulado</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Simulado" class="img-fluid" style="max-width: 300px;">
      </div>
    </div>
  </div>
</section>

<!-- CONTATO -->
<section id="contato">
  <div class="container text-center">
    <h2>Contato e Suporte</h2>
    <p class="lead mb-4">Está com dúvidas, encontrou algum problema ou precisa de ajuda?</p>
    <p>Entre em contato conosco pelo e-mail abaixo e retornaremos o mais rápido possível.</p>
    <a href="mailto:muriloluzbressam7@gmail.com" class="btn btn-bordo btn-lg mt-3">
      <i class="bi bi-envelope-fill me-2"></i>Enviar E-mail de Suporte
    </a>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <p>&copy; 2025 Simulado ETEC. Todos os direitos reservados.</p>
  <p>Desenvolvido para fins educacionais. Inspirado no site oficial da ETEC Bebedouro.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
