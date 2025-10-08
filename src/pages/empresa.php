<?php
require_once '../database/config.php';
require_once '../database/auth.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membros da Empresa - Aurora IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/css-pages/empresa.css">
    <link rel="stylesheet" href="../css/css-globais/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">

    <!-- Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

    <!-- libras -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <!-- end libras -->

    <header class="header">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="../img/logo/logo.png" alt="Logo" class="img-fluid" />
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
                                        <a class="nav-link" href="../../index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../index.php">Serviços</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../index.php">Planos</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="../pages/faleconosco.php">Fale conosco</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../index.php">Sobre a empresa</a>
                                    </li>

                                    <?php if(estaLogado()) : ?>
                                    <li class="nav-item d-lg-none">
                                        <a class="nav-link" href="../pages/perfil.php">Meu Perfil</a>
                                    </li>
                                    <?php else : ?>
                                    <li class="nav-item d-lg-none">
                                        <a class="nav-link" href="../pages/login.php">Login</a>
                                    </li>
                                    <?php endif ?>
                                </ul>

                                <?php if(estaLogado()) : ?>
                                <!-- Mostra a imagem do usuário logado (apenas em desktop) -->
                                <?php if($_SESSION['usuario']['nivel'] == 0):?>
                                <div class="d-none d-lg-flex align-items-center ms-4">
                                    <a href="../pages/perfilUsuario.php"
                                        class="perfil d-flex align-items-center text-decoration-none">
                                        <img src="<?php echo $fotoPerfil; ?>" class="border rounded-circle me-2"
                                            alt="Usuário" style="width: 40px; height: 40px;">
                                        <span
                                            class="fw-bold text-white"><?php echo ucfirst(explode(' ', $_SESSION['usuario']['nome'])[0]) ?></span>
                                    </a>
                                </div>

                                <?php elseif($_SESSION['usuario']['nivel'] == 1):?>
                                <div class="d-none d-lg-flex align-items-center ms-4">
                                    <a href="../pages/perfil.php"
                                        class="perfil d-flex align-items-center text-decoration-none">
                                        <img src="<?php echo $fotoPerfil; ?>" class="border rounded-circle me-2"
                                            alt="Usuário" style="width: 40px; height: 40px;">
                                        <span
                                            class="fw-bold text-white"><?php echo ucfirst(explode(' ', $_SESSION['usuario']['nome'])[0]) ?></span>
                                    </a>
                                </div>
                                <?php endif?>

                                <?php else : ?>
                                <div class="d-none d-lg-block ms-4">
                                    <a href="../pages/login.php" class="btn btn-outline-light">Login</a>
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
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="background-elements">
                <div class="bg-circle circle-1"></div>
                <div class="bg-circle circle-2"></div>
            </div>

            <div class="hero-content">

                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <div class="hero-text">
                                <h1>Porti<span class="accent-text">folio</span></h1>
                                <h2>Aurora Ability IT</h2>
                                <p class="description">Somos apaixonados por criar experiências digitais únicas que unem
                                    design criativo com desenvolvimento funcional. Nosso objetivo é transformar ideias
                                    em soluções digitais que inspiram, conectam e geram resultados.</p>

                                <div class="social-links">
                                    <a href="https://www.instagram.com/aurorability.it?igsh=NTc4MTIwNjQ2YQ=="><i
                                            class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                            <div class="hero-visual">
                                <div class="profile-container">
                                    <div class="profile-background"></div>
                                    <img src="../img/logo/segunda-opcao-logo.png" alt="Alexander Chen"
                                        class="profile-image">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- ======== feature-section start ======== -->
        <section id="servicos" class="feature-section py-5">
            <div class="container">
                <div class="row text-center mb-5">
                    <div class="col-12">
                        <h2 class="fw-bold">Nossos <span class="text-muted">Serviços</span></h2>
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
                                        Sites que se adaptam a qualquer dispositivo, proporcionando a melhor experiência
                                        ao
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
                                    <p class="card-text">Comércio eletrônico moderno com design atrativo e ferramentas
                                        para
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
                                    <p class="card-text">Melhoramos o posicionamento do seu site no Google e atraímos
                                        mais
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
                                    <p class="card-text">Aplicativos com design moderno e foco em usabilidade,
                                        performance e
                                        integração com sistemas web.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>
        <!-- ======== feature-section end ======== -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
                        <div class="profile-card">
                            <div class="profile-header">
                                <div class="profile-image">
                                    <img src="../img/logo/segunda-opcao-logo.png" alt="Profile Image" class="img-fluid">
                                </div>
                            </div>

                            <div class="profile-content">
                                <h3>Aurora Ability</h3>

                                <div class="contact-links">
                                    <a href="mailto:marcus@example.com" class="contact-item">
                                        <i class="bi bi-envelope"></i>
                                        aurorait12345@gmail.com
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-content">
                            <div class="section-header">
                                <h2>Apaixonados em Criar Experiências Digitais</h2>
                            </div>

                            <div class="description">
                                <p>Trabalhamos para desenvolver soluções inovadoras que combinam tecnologia, estética e
                                    usabilidade. Cada projeto é pensado para atender às necessidades do cliente,
                                    entregando qualidade, funcionalidade e impacto.</p>
                            </div>

                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-number">3+</div>
                                    <div class="stat-label">Projetos completos</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">3+</div>
                                    <div class="stat-label">Anos de experiência</div>
                                </div>
                            </div>

                            <div class="details-grid">
                                <div class="detail-row">
                                    <div class="detail-item">
                                        <span class="detail-label">Linguagens</span>
                                        <span class="detail-value">Inglês e Espanhol</span>
                                    </div>
                                </div>
                            </div>

                            <div class="cta-section">
                                <a href="#" class="btn btn-primary">
                                    Conheça nosso instagram
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

    </main>





    <section class="team-section">
        <div class="container">
            <h2 class="main-title">Nossa Equipe</h2>
            <p class="main-subtitle">Conheça os profissionais talentosos que transformam ideias em realidade digital</p>

            <div class="team-category">
                <div class="category-header">
                    <div class="category-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="category-title">Desenvolvedores</h3>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="team-member">
                            <div class="member-photo">
                                <img src="../img/equipe/nayara.jpeg" alt="Nayara - Desenvolvedora">
                            </div>
                            <div class="member-info">
                                <h4 class="member-name">Nayara Silva</h4>
                                <span class="member-role">Desenvolvedora Front-end</span>
                                <p class="member-description">Mestre em transformar layouts complexos em interfaces de
                                    usuário fluidas e interativas, com foco total em performance e acessibilidade.</p>

                                <div class="skills-container">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">HTML/CSS & Acessibilidade</span>
                                            <span class="skill-percentage">95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 95%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">JavaScript</span>
                                            <span class="skill-percentage">90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Bootstrap</span>
                                            <span class="skill-percentage">88%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 88%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="member-social">
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="team-member">
                            <div class="member-photo">
                                <img src="../img/equipe/nickolas.jpeg" alt="Nickolas - Desenvolvedor">
                            </div>
                            <div class="member-info">
                                <h4 class="member-name">Nickolas Cremasco</h4>
                                <span class="member-role">Desenvolvedor Full Stack</span>
                                <p class="member-description">Arquiteto de soluções robustas, Nickolas garante que a
                                    lógica do servidor e a infraestrutura da aplicação estejam sempre em perfeita
                                    sintonia e escalabilidade.</p>

                                <div class="skills-container">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Desenvolvimento Back-end (Node/PHP)</span>
                                            <span class="skill-percentage">92%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 92%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Arquitetura de Banco de Dados</span>
                                            <span class="skill-percentage">90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Git e Github</span>
                                            <span class="skill-percentage">85%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 85%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="member-social">
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-category">
                <div class="category-header">
                    <div class="category-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="category-title">Design & UX/UI</h3>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="team-member">
                            <div class="member-photo">
                                <img src="../img/equipe/izabela.jpeg" alt="Izabela - Designer">
                            </div>
                            <div class="member-info">
                                <h4 class="member-name">Izabela Tinoco</h4>
                                <span class="member-role">UI/UX Designer</span>
                                <p class="member-description">Com um olhar apurado para estética e empatia, Izabela
                                    desenha jornadas de usuário que encantam, transformando necessidades complexas em
                                    interfaces intuitivas.</p>

                                <div class="skills-container">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Pesquisa de Usuário (UX)</span>
                                            <span class="skill-percentage">92%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 92%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Design de Interface (UI)</span>
                                            <span class="skill-percentage">95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 95%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Prototipagem Interativa</span>
                                            <span class="skill-percentage">90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="member-social">
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="team-member">
                            <div class="member-photo">
                                <img src="../img/equipe/bruno.jpeg" alt="Bruno - Designer">
                            </div>
                            <div class="member-info">
                                <h4 class="member-name">Bruno Rufino</h4>
                                <span class="member-role">Designer Gráfico & Ilustrador</span>
                                <p class="member-description">Bruno é o artista que dá vida à identidade visual das
                                    marcas, criando ilustrações, logotipos e elementos gráficos únicos que contam uma
                                    história e cativam o público.</p>

                                <div class="skills-container">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Identidade Visual (Branding)</span>
                                            <span class="skill-percentage">94%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 94%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Ilustração Digital</span>
                                            <span class="skill-percentage">90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="member-social">
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="team-category">
                <div class="category-header">
                    <div class="category-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="category-title">Marketing & Social Media</h3>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="team-member">
                            <div class="member-photo">
                                <img src="../img/equipe/aline.jpeg" alt="Aline - Marketing">
                            </div>
                            <div class="member-info">
                                <h4 class="member-name">Aline Rodrigues</h4>
                                <span class="member-role">Estrategista de Marketing Digital</span>
                                <p class="member-description">Aline é a mente por trás das campanhas de sucesso. Ela
                                    analisa o mercado, define estratégias de SEO e cria funis de conversão para garantir
                                    que os projetos atinjam o público certo.</p>

                                <div class="skills-container">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Estratégia de SEO</span>
                                            <span class="skill-percentage">95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 95%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Marketing de Conteúdo</span>
                                            <span class="skill-percentage">90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Análise de Métricas (Analytics)</span>
                                            <span class="skill-percentage">88%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 88%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="member-social">
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="team-member">
                            <div class="member-photo">
                                <img src="../img/equipe/maria-eduarda.jpeg" alt="Maria Eduarda - Social Media">
                            </div>
                            <div class="member-info">
                                <h4 class="member-name">Maria Eduarda</h4>
                                <span class="member-role">Gerente de Mídias Sociais</span>
                                <p class="member-description">Especialista em criar comunidades online engajadas, Maria
                                    gerencia perfis sociais com criatividade, produzindo conteúdo relevante e
                                    construindo relacionamentos sólidos.</p>

                                <div class="skills-container">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Gestão de Comunidades</span>
                                            <span class="skill-percentage">95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 95%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Copywriting para Redes Sociais</span>
                                            <span class="skill-percentage">92%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 92%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Análise de Engajamento</span>
                                            <span class="skill-percentage">88%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 88%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="member-social">
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-category">
                <div class="category-header">
                    <div class="category-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h3 class="category-title">Documentação & Qualidade</h3>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="team-member">
                            <div class="member-photo">
                                <img src="../img/equipe/alana.jpeg" alt="Allana - Documentação e QA">
                            </div>
                            <div class="member-info">
                                <h4 class="member-name">Allana</h4>
                                <span class="member-role">Analista de Documentação & QA</span>
                                <p class="member-description">Garantindo clareza e qualidade, Allana cria documentações
                                    técnicas detalhadas e conduz testes rigorosos para assegurar que cada entrega esteja
                                    impecável.</p>

                                <div class="skills-container">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Documentação Técnica</span>
                                            <span class="skill-percentage">95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 95%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Teste de Qualidade</span>
                                            <span class="skill-percentage">90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">Metodologias Ágeis</span>
                                            <span class="skill-percentage">92%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 92%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="member-social">
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".swiper", {
        loop: true,
        centeredSlides: true,
        slidesPerView: 3,
        spaceBetween: 20,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    </script>


    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>