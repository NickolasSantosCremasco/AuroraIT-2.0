<?php
require_once 'src/database/config.php';
require_once 'src/database/auth.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="src/img/favicon/favicon.png" />
    <title>Aurora Ability IT - Tecnologia com Acessibilidade</title>

    <!-- LINKS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- BOXICON  -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="src/css/css-globais/Footer.css">

    <!-- CSS DA PÁGINA -->
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/bootstrap.min.css" />

    <!-- CSS RESPONSIVO -->
    <link rel="stylesheet" href="src/css/responsivo.css">

    <!-- JS DE ACESSIBILIDADE -->
    <script src="src/js/acessibilidade.js" defer></script>

    <style>
    /* Estilos otimizados para responsividade */
    .hero-section {
        padding: 190px 0 20px;
    }


    .feature-card .icon-circle {
        width: 80px;
        height: 80px;
        background: #e0f7fa;
        /* Cor de fundo do círculo */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        border: 2px solid #b2ebf2;
        /* Cor da borda */
    }

    .feature-card .icon-circle i {
        font-size: 3rem;
        color: #00bcd4;
        /* Cor do ícone */
    }

    .card-title {
        color: #333;
        font-weight: 600;
    }

    .card-text {
        color: #666;
    }

    .feature-card {
        border-radius: 15px;
        transition: transform 0.3s ease-in-out;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .navbar-toggler {
        border: none;
        padding: 0;
    }

    .toggler-icon {
        display: block;
        width: 25px;
        height: 3px;
        background-color: #fff;
        margin: 5px 0;
        transition: all 0.3s ease;
    }

    .navbar-toggler[aria-expanded="true"] .toggler-icon:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .navbar-toggler[aria-expanded="true"] .toggler-icon:nth-child(2) {
        opacity: 0;
    }

    .navbar-toggler[aria-expanded="true"] .toggler-icon:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }

    .header_hero {
        position: relative;
        padding: 100px 0;
        overflow: hidden;
    }

    .header_hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: rgba(110, 142, 251, 0.1);
        border-radius: 50%;
        z-index: -1;
    }

    .header_hero::after {
        content: '';
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 200px;
        height: 200px;
        background: rgba(167, 119, 227, 0.1);
        border-radius: 50%;
        z-index: -1;
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2rem;
        }

        .header_hero_content {
            text-align: center;
        }

        .header_social {
            position: static !important;
            justify-content: center;
            margin-bottom: 30px;
        }

        .header_hero_image {
            margin-top: 30px !important;
        }
    }

    .blog-card {
        transition: transform 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-5px);
    }

    .whatsapp-hover {
        transition: transform 0.3s ease;
    }

    .whatsapp:hover .whatsapp-hover {
        transform: scale(1.1);
    }

    .feature-card .icon-circle {
        width: 80px;
        height: 80px;
        background: #e0f7fa;
        /* Cor de fundo do círculo */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        border: 2px solid #b2ebf2;
        /* Cor da borda */
    }

    .feature-card .icon-circle i {
        font-size: 3rem;
        color: #00bcd4;
        /* Cor do ícone */
    }

    .card-title {
        color: #333;
        font-weight: 600;
    }

    .card-text {
        color: #666;
    }

    .feature-card {
        border-radius: 15px;
        transition: transform 0.3s ease-in-out;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }


    .featured::before {
        content: 'MAIS POPULAR';
        position: absolute;
        top: 30px;
        left: -40px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 8px 40px;
        font-size: 0.8rem;
        font-weight: bold;
        transform: rotate(-45deg);
        z-index: 2;
    }
    </style>
</head>

<body>

    <!-- ======== header start ======== -->
    <header class="header">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="src/img/logo/logo.png" alt="Logo" class="img-fluid" />
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#servicos">Serviços</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#planos">Planos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#redes">Redes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="src/pages/faleconosco.php">Fale conosco</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#empresa">Sobre a empresa</a>
                                    </li>

                                    <?php if(estaLogado()) : ?>
                                    <li class="nav-item d-lg-none">
                                        <a class="nav-link" href="src/pages/perfil.php">Meu Perfil</a>
                                    </li>
                                    <?php else : ?>
                                    <li class="nav-item d-lg-none">
                                        <a class="nav-link" href="src/pages/login.php">Login</a>
                                    </li>
                                    <?php endif ?>
                                </ul>

                                <?php if(estaLogado()) : ?>
                                <!-- Mostra a imagem do usuário logado (apenas em desktop) -->
                                <div class="d-none d-lg-flex align-items-center ms-4">
                                    <a href="src/pages/perfil.php"
                                        class="perfil d-flex align-items-center text-decoration-none">
                                        <img src="src/img/icono-usuario_126283-435.avif"
                                            class="border rounded-circle me-2" alt="Usuário"
                                            style="width: 40px; height: 40px;">
                                        <span
                                            class="fw-bold text-white"><?php echo ucfirst(explode(' ', $_SESSION['usuario']['nome'])[0]) ?></span>
                                    </a>
                                </div>
                                <?php else : ?>
                                <div class="d-none d-lg-block ms-4">
                                    <a href="src/pages/login.php" class="btn btn-outline-light">Login</a>
                                </div>
                                <?php endif ?>
                            </div>
                            <!-- navbar collapse -->
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->
    </header>
    <!-- ======== header end ======== -->

    <a href="https://wa.me/5511974557734" target="_blank" class="position-fixed bottom-0 end-0 m-3 whatsapp"
        style="z-index: 22222;">
        <img src="src/img/logo/whatsapp.png" alt="WhatsApp" class="img-fluid rounded-circle shadow whatsapp-hover"
            style="width: clamp(60px, 10vw, 70px); height: auto;">
    </a>

    <!-- ======== hero-section start ======== -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".4s">
                            Bem-vindo à Aurora IT
                        </h1>
                        <p class="wow fadeInUp" style="text-align: justify;" data-wow-delay=".6s">
                            Somos apaixonados por transformar ideias em experiências digitais acessíveis, funcionais
                            e inovadoras. Na Aurora Ability, tecnologia e inclusão caminham lado a lado para criar
                            soluções
                            únicas, feitas sob medida para cada pessoa.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#servicos" class="main-btn border-btn btn-hover wow fadeInUp"
                                data-wow-delay=".7s">Venha nos Conhecer!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="src/img/hero-img.png" alt="inicial" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======== hero-section end ======== -->

    <!-- ======== feature-section start ======== -->
    <section id="servicos" class="feature-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="fw-bold">Nossos <span class="text-primary">Serviços</span></h2>
                    <p class="text-muted">Oferecemos soluções completas para sua presença digital</p>
                </div>
            </div>
            <div class="row justify-content-center">

                <!-- Card 1 -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card feature-card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="icon icon-circle mb-3 mx-auto">
                                    <i class='bx bx-code'></i>
                                </div>
                                <h5 class="card-title">Sites Responsivos</h5>
                                <p class="card-text">
                                    Sites que se adaptam a qualquer dispositivo, proporcionando a melhor experiência ao
                                    usuário.
                                </p>
                            </div>
                        </div>
                    </div>


                    <!-- Card 2 -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card feature-card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="icon icon-circle mb-3 mx-auto">
                                    <i class='bx bx-store-alt-2'></i>
                                </div>
                                <h5 class="card-title">Lojas Virtuais</h5>
                                <p class="card-text">Comércio eletrônico moderno com design atrativo e ferramentas para
                                    aumentar suas vendas.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card feature-card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="icon icon-circle mb-3 mx-auto">
                                    <i class='bx bx-pencil'></i>
                                </div>
                                <h5 class="card-title">Otimização SEO</h5>
                                <p class="card-text">Melhoramos o posicionamento do seu site no Google e atraímos mais
                                    visitantes qualificados.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="card feature-card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="icon icon-circle mb-3 mx-auto">
                                    <i class='bx bx-mobile'></i>
                                </div>
                                <h5 class="card-title">Aplicativos Mobile</h5>
                                <p class="card-text">Aplicativos com design moderno e foco em usabilidade, performance e
                                    integração com sistemas web.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <!-- Planos Section -->
    <section class="container-fluid py-5 bg-light" id="planos">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Nossos <span class="text-primary">Planos</span></h2>
                <p class="text-muted">Escolha o plano ideal para o seu negócio</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden tour-card">
                        <div class="position-relative">
                            <img src="src/img/card1.jpg" class="card-img-top" alt="Plano Básico"
                                style="height: 200px; object-fit: cover;">
                            <span
                                class="position-absolute top-0 end-0 m-2 badge bg-primary fs-6 px-3 py-2 rounded-pill shadow-sm">$2,490</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Plano Básico</h5>
                            <p class="card-text text-muted small">Ideal para quem está começando. Entregamos o essencial
                                com velocidade e simplicidade.</p>

                            <ul class="list-group list-group-flush mb-3 border-0">
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Design:</strong> Usamos um template, adaptamos as cores e logo.
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Dev:</strong> Página única com HTML/CSS (landing page).
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Social Media:</strong> Criamos o perfil e postamos 1x por semana.
                                </li>
                            </ul>

                            <div class="mt-auto">
                                <div class="mb-3">
                                    <span
                                        class="badge bg-light text-dark border rounded-pill me-1 mb-1">Essencial</span>
                                    <span class="badge bg-light text-dark border rounded-pill me-1 mb-1">Pronto Pra
                                        Usar</span>
                                    <span class="badge bg-light text-dark border rounded-pill mb-1">Rápido</span>
                                </div>
                                <?php if(!estaLogado()):?>
                                <a href="src/pages/login.php" class="btn btn-primary w-100 fw-semibold">
                                    Adquira Já <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>
                                <?php else : ?>
                                <a href="src/pages/faleconosco.php" class="btn btn-primary w-100 fw-semibold">
                                    Adquira Já <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden tour-card">
                        <div class="position-relative featured">

                            <img src="src/img/card2.jpeg" class="card-img-top" alt="Plano Intermediário"
                                style="height: 200px; object-fit: cover;">
                            <span
                                class="position-absolute top-0 end-0 m-2 badge bg-primary fs-6 px-3 py-2 rounded-pill shadow-sm">$4,950</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Plano Intermediário</h5>
                            <p class="card-text text-muted small">Para empresas que querem uma presença sólida e
                                funcional.</p>

                            <ul class="list-group list-group-flush mb-3 border-0">
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Design:</strong> Visual próprio, responsivo, com identidade visual
                                    personalizada.
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Dev:</strong> Até páginas com formulário e responsividade (HTML, CSS, JS).
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Social Media:</strong> Estratégia semanal, com 3 posts por semana.
                                </li>
                            </ul>

                            <div class="mt-auto">
                                <div class="mb-3">
                                    <span
                                        class="badge bg-light text-dark border rounded-pill me-1 mb-1">Identidade</span>
                                    <span class="badge bg-light text-dark border rounded-pill me-1 mb-1">Presença
                                        Digital</span>
                                    <span class="badge bg-light text-dark border rounded-pill mb-1">Estratégico</span>
                                </div>
                                <?php if(!estaLogado()):?>
                                <a href="src/pages/login.php" class="btn btn-primary w-100 fw-semibold">
                                    Adquira Já <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>
                                <?php else : ?>
                                <a href="src/pages/faleconosco.php" class="btn btn-primary w-100 fw-semibold">
                                    Adquira Já <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden tour-card">
                        <div class="position-relative">
                            <img src="src/img/card2.webp" class="card-img-top" alt="Plano Avançado"
                                style="height: 200px; object-fit: cover;">
                            <span
                                class="position-absolute top-0 end-0 m-2 badge bg-primary fs-6 px-3 py-2 rounded-pill shadow-sm">$6,420</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Plano Avançado</h5>
                            <p class="card-text text-muted small">Para empresas que querem se destacar e crescer no
                                digital.</p>

                            <ul class="list-group list-group-flush mb-3 border-0">
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Design:</strong> UX/UI pensadas do zero, com protótipos e testes de
                                    usabilidade.
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Dev:</strong> Site completo com backend (login, banco, painel admin).
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2 small">
                                    <strong>Social Media:</strong> Planejamento mensal, análises de resultado,
                                    calendário e execução.
                                </li>
                            </ul>

                            <div class="mt-auto">
                                <div class="mb-3">
                                    <span class="badge bg-light text-dark border rounded-pill me-1 mb-1">UX
                                        Premium</span>
                                    <span
                                        class="badge bg-light text-dark border rounded-pill me-1 mb-1">Automação</span>
                                    <span class="badge bg-light text-dark border rounded-pill mb-1">Alta
                                        Performance</span>
                                </div>
                                <?php if(!estaLogado()):?>
                                <a href="src/pages/login.php" class="btn btn-primary w-100 fw-semibold">
                                    Adquira Já <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>
                                <?php else : ?>
                                <a href="src/pages/faleconosco.php" class="btn btn-primary w-100 fw-semibold">
                                    Adquira Já <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======== feature-section end ======== -->

    <!-- Sobre a Empresa Section -->
    <section id="empresa" class="header_hero py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="header_hero_content">
                        <div class="hero-texts">
                            <h5 class="header_sub_title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                Espera</h5>
                            <h2 class="header_title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                                Você sabe quem é a Aurora Ability?</h2>
                            <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">A Aurora Ability
                                nasceu de um grupo de jovens estudantes, cada um com sua perspectiva única e
                                experiências diversas.</p>
                            <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">Unidos por um
                                propósito comum, eles decidiram transformar o mundo digital em um espaço mais
                                acessível e acolhedor para todos. As ideias inovadoras de cada um, combinadas com a
                                paixão por
                                criar um ambiente digital inclusivo, deram origem à Aurorability, uma empresa que
                                busca fazer a diferença na vida de todos os usuários.</p>
                            <div class="buttons mt-4">
                                <a href="https://rebrand.ly/freelancer-ud" rel="nofollow"
                                    class="main-btn-one wow fadeInUp me-2 mb-2" data-wow-duration="1.3s"
                                    data-wow-delay="1.4s">Saiba Mais</a>
                                <a href="#servicos" rel="nofollow" class="main-btn-two wow fadeInUp mb-2"
                                    data-wow-duration="1.3s" data-wow-delay="1.4s">Nossos Serviços</a>
                            </div>
                        </div>
                    </div> <!-- header hero content -->
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="header_hero_image mt-5 mt-lg-0 wow fadeInRightBig" data-wow-duration="1.3s"
                        data-wow-delay="1.8s">
                        <img src="src/img/image.png" alt="Aurora Ability" class="img-fluid rounded shadow">
                    </div> <!-- header hero image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

        <!-- Redes Sociais -->
        <div id="redes" class="d-flex justify-content-center mt-5">
            <ul class="header_social d-flex list-unstyled gap-3">
                <li><a href="#" class="text-decoration-none fs-4"><i class="bi bi-whatsapp"></i></a></li>
                <li><a href="#" class="text-decoration-none fs-4"><i class="bi bi-github"></i></a></li>
                <li><a href="#" class="text-decoration-none fs-4"><i class="bi bi-instagram"></i></a></li>
                <li><a href="#" class="text-decoration-none fs-4"><i class="bi bi-linkedin"></i></a></li>
            </ul>
        </div>
    </section>


    <section class="container py-5">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h6 class="text-muted text-uppercase">PORTFÓLIO</h6>
                <h2 class="fw-bold">Nossos <span class="text-info">Projetos</span></h2>
                <p class="text-muted">Conheça alguns dos nossos trabalhos mais recentes.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-6 mb-4" id="">
                <a href="#" class="text-decoration-none">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        <img src="src/img/projetos/Captura de tela 2025-08-19 203736.png" class="card-img-top"
                            alt="Website de Computação Quântica">
                        <div class="card-body text-center">
                            <span class="badge bg-info mb-2">Educação</span>
                            <h5 class="card-title text-black">Quatun</h5>
                            <p style="text-align: justify;">Quantun é uma empresa dedicada a evolução intelectual dos
                                seus usuários,
                                divulgando
                                conhecimentos sobre a computação quântica e comercializando oportunidades de ter mais
                                tempo com automações</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        <img src="src/img/projetos/projeto2.jpeg" class=" card-img-top" alt="Website de Jogos">
                        <div class="card-body text-center">
                            <span class="badge bg-success mb-2">Entretenimento</span>
                            <h5 class="card-title text-black">PlayOn</h5>
                            <p style="text-align: justify;">PlayOn é uma instituição voltada para o desenvolvimento de
                                jogos
                                indies,
                                detentora de 3
                                jogos autorais em sua página, foi o produto final de uma apresentação de projeto final.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        <img src="src/img/projetos/projeto3.png" class="card-img-top" alt="E-commerce de Roupas">
                        <div class="card-body text-center">
                            <span class="badge mb-2" style="background-color: #00bcd4;">Cuidado Pessoal</span>

                            <h5 class="card-title text-black">Site Institucional</h5>
                            <p style="text-align: justify;">Site institucional criado com o objetivo de apresentar as
                                terapias da nossa cliente
                                Alexandra Sarandi, detém painel de controle, serviços fornecidos e nossa curadoria em
                                redes
                                suas
                                sociais!
                            </p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <!-- Coluna Sobre -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">
                        <img src="src/img/logo/logo.png" style="width: 50%;" alt="Logo Aurora Ability"
                            class="img-fluid">
                    </h5>
                    <p class="mb-3">Transformando o mundo digital em um espaço mais acessível e acolhedor para todos.
                    </p>
                    <div class="d-flex gap-3">

                        <a href="#" class="text-white fs-5"><i class="bi bi-instagram"></i></a>

                    </div>
                </div>

                <!-- Coluna Links Rápidos -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Serviços</a></li>
                        <li class="mb-2"><a href="#planos" class="text-white text-decoration-none">Planos</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Sobre Nós</a></li>
                    </ul>
                </div>

                <!-- Coluna Serviços -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">Nossos Serviços</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Sites Responsivos</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Lojas Virtuais</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Otimização SEO</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Aplicativos Mobile</a></li>
                    </ul>
                </div>

                <!-- Coluna Contato -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="text-uppercase fw-bold mb-4">Contato</h5>
                    <ul class="list-unstyled">

                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-telephone-fill me-2"></i>
                            <span>(11) 97455-7734</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-envelope-fill me-2"></i>
                            <span>contato@auroraability.com</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-clock-fill me-2"></i>
                            <span>Seg - Sex: 9h - 18h</span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-4">

            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2025 Aurora Ability IT. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Desenvolvido com <i class="bi bi-heart-fill text-danger"></i> e foco na
                        acessibilidade digital</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JSs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    </script>
    <script src="src/js/mod.js"></script>

</body>

</html>