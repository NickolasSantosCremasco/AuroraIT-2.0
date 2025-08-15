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
    <!-- <link rel="stylesheet" href="src/css-globais/navbar.css"> -->
    <link rel="stylesheet" href="src/css/css-globais/Footer.css">

    <!-- CSS DA PÁGINA -->
    <link rel="stylesheet" href="src/css/index.css">
    <link rel="stylesheet" href="src/css/bootstrap.min.css" />

    <!-- CSS RESPONSIVO -->
    <link rel="stylesheet" href="src/css/responsivo.css">

    <!-- JS DE ACESSIBILIDADE -->
    <script src="src/js/acessibilidade.js" defer></script>
    <style>

    </style>
</head>

<body>

    <!-- ======== header start ======== -->
    <header class=" header">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="src/img/logo/logo.png" alt="Logo" />
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
                                        <a class="page-scroll active" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#servicos">Serviços</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="src/pages/planos.php">Planos</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#redes">Redes</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="src/pages/faleconosco.php">Fale conosco</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#empresa">Sobre a empresa</a>
                                    </li>


                                    <?php if(estaLogado()) : ?>
                                    <!-- Mostra a imagem do usuário logado -->
                                    <div class="d-flex align-items-center flex-column gap-2"
                                        style="position: relative; bottom: 15px; left: 20px;">
                                        <a href="src/pages/perfil.php" class="perfil">
                                            <img src="https://icon-library.com/images/generic-user-icon/generic-user-icon-9.jpg"
                                                class="border" alt="Usuário"
                                                style="width: 60px; height: 60px; border-radius: 50%;">
                                        </a>
                                        <span class="fw-bold"
                                            style="color: white;"><?php echo ucfirst(explode(' ', $_SESSION['usuario']['nome'])[0]) ?></span>
                                    </div>
                                    <?php else : ?>

                                    <li class="nav-item-login">
                                        <a href="src/pages/login.php">Login</a>
                                    </li>
                                    <?php endif ?>

                                </ul>
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
    <a href="https://wa.me/5511974557734" target="_blank"
        class="position-fixed bottom-0 end-0 m-3 transition-all duration-300 hover:scale-110 whatsapp"
        style="z-index: 22222;">

        <img src=" src/img/logo/whatsapp.png" alt="WhatsApp" class="img-fluid rounded-circle shadow whatsapp-hover"
            style="width: clamp(60px, 10vw, 100px); height: auto;">
    </a>

    <!-- ======== hero-section start ======== -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".4s">
                            Bem-vindo à Aurora Ability IT
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            Somos apaixonados por transformar ideias em experiências digitais acessíveis, funcionais
                            e
                            inovadoras.
                            Na Aurora Ability, tecnologia e inclusão caminham lado a lado para criar soluções
                            únicas,
                            feitas sob medida para cada pessoa.

                        </p>
                        <a href="javascript:void(0)" class="main-btn border-btn btn-hover wow fadeInUp"
                            data-wow-delay=".6s">Solicite um Orçamento!</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="src/img/hero-img.png" alt="inicial" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======== hero-section end ======== -->

    <!-- ======== feature-section start ======== -->
    <section id="servicos" class="feature-section py-5">
        <div class="container">
            <div class="row text-center justify-content-center">

                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="single-feature">
                        <div class="icon icon-circle">
                            <i class='bx bx-code'></i>
                        </div>
                        <div class="content">
                            <h5>Sites Responsivos</h5>
                            <p>Sites que se adaptam a qualquer dispositivo, proporcionando a melhor experiência ao
                                usuário.
                            </p>
                        </div>


                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="single-feature">
                        <div class="icon icon-circle">
                            <i class='bx bx-store-alt-2'></i>
                        </div>
                        <div class="content">
                            <h5>Lojas Virtuais</h5>
                            <p>Comércio eletrônico moderno com design atrativo e ferramentas para aumentar suas
                                vendas.
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="single-feature">
                        <div class="icon icon-circle">
                            <i class='bx bx-pencil'></i>
                        </div>
                        <div class="content">
                            <h5>Otimização SEO</h5>
                            <p>Melhoramos o posicionamento do seu site no Google e atraímos mais visitantes
                                qualificados.
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="single-feature">
                        <div class="icon icon-circle">
                            <i class='bx bx-mobile'></i>
                        </div>
                        <div class="content">
                            <h5> Mobile</h5>
                            <p>Aplicativos com design moderno e foco em usabilidade, performance e integração com
                                sistemas
                                web.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container-fluid py-5" style="background: rgb(167, 167, 167,0.1);;">
        <div class="text-center mb-5">
            <small class="text-uppercase text-secondary fw-bold">Planos</small>
            <h2 class="fw-bold mt-2">Nossos <span class="text-primary">Planos</span></h2>
        </div>

        <div class="row g-5 px-5">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="tour-card card h-100 shadow-sm border-0 rounded-4 overflow-hidden transition transform hover-shadow"
                    style="transition: all 0.3s ease-in-out;">

                    <div class="position-relative">
                        <img src="src/img/card1.jpg" class="w-100" alt="Beach"
                            style="object-fit: cover; height: 220px;">
                        <span
                            class="position-absolute top-0 end-0 m-2 badge bg-primary fs-6 px-3 py-2 rounded-pill shadow-sm">$2,490</span>
                    </div>

                    <div class="p-4 d-flex flex-column justify-content-between h-100">
                        <div>
                            <h5 class="fw-bold text-dark mb-2">Plano Básico</h5>
                            <p class="small text-muted mb-3">Ideal para quem está começando. Entregamos o essencial
                                com
                                velocidade e simplicidade.</p>
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Design:</strong> Usamos um template, adaptamos as cores e logo.
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Dev:</strong> Página única com HTML/CSS (landing page).
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Social Media:</strong> Criamos o perfil e postamos 1x por semana.
                                </li>
                            </ul>
                        </div>

                        <div>
                            <div class="mb-3">
                                <span class="badge bg-light text-dark border rounded-pill me-1">Essencial</span>
                                <span class="badge bg-light text-dark border rounded-pill me-1">Pronto Pra
                                    Usar</span>
                                <span class="badge bg-light text-dark border rounded-pill">Rápido</span>
                            </div>
                            <?php if(!estaLogado()):?>
                            <a href="src/pages/login.php"
                                class="btn btn-primary w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                                Adquira Já
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                            <?php else : ?>
                            <a href="src/pages/faleconosco.php"
                                class="btn btn-primary w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                                Adquira Já
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="tour-card card h-100 shadow-sm border-0 rounded-4 overflow-hidden transition transform hover-shadow"
                    style="transition: all 0.3s ease-in-out;">

                    <div class="position-relative">
                        <img src="src/img/card2.jpeg" class="w-100" alt="Arctic"
                            style="object-fit: cover; height: 220px;">
                        <span
                            class="position-absolute top-0 end-0 m-2 badge bg-primary fs-6 px-3 py-2 rounded-pill shadow-sm">$4,950</span>
                    </div>

                    <div class="p-4 d-flex flex-column justify-content-between h-100">
                        <div>
                            <h5 class="fw-bold text-dark mb-2">Plano Intermediário</h5>
                            <p class="small text-muted mb-3">Para empresas que querem uma presença sólida e
                                funcional.
                            </p>
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Design:</strong> Visual próprio, responsivo, com identidade visual
                                    personalizada.
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Dev:</strong> Até páginas com formulário e responsividade (HTML, CSS,
                                    JS).
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Social Media:</strong> Estratégia semanal, com 3 posts por semana.
                                </li>
                            </ul>
                        </div>

                        <div>
                            <div class="mb-3">
                                <span class="badge bg-light text-dark border rounded-pill me-1">Identidade</span>
                                <span class="badge bg-light text-dark border rounded-pill me-1">Presença
                                    Digital</span>
                                <span class="badge bg-light text-dark border rounded-pill">Estratégico</span>
                            </div>
                            <?php if(!estaLogado()):?>
                            <a href="src/pages/login.php"
                                class="btn btn-primary w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                                Adquira Já
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                            <?php else : ?>
                            <a href="src/pages/faleconosco.php"
                                class="btn btn-primary w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                                Adquira Já
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="tour-card card h-100 shadow-sm border-0 rounded-4 overflow-hidden transition transform hover-shadow"
                    style="transition: all 0.3s ease-in-out;">

                    <div class="position-relative">
                        <img src="src/img/card2.webp" class="w-100" alt="Sahara"
                            style="object-fit: cover; height: 220px;">
                        <span
                            class="position-absolute top-0 end-0 m-2 badge bg-primary fs-6 px-3 py-2 rounded-pill shadow-sm">$6,420</span>
                    </div>

                    <div class="p-4 d-flex flex-column justify-content-between h-100">
                        <div>
                            <h5 class="fw-bold text-dark mb-2">Plano Avançado</h5>
                            <p class="small text-muted mb-3">Para empresas que querem se destacar e crescer no
                                digital.
                            </p>
                            <ul class="list-group list-group-flush mb-3">
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Design:</strong> UX/UI pensadas do zero, com protótipos e testes de
                                    usabilidade.
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Dev:</strong> Site completo com backend (login, banco, painel admin).
                                </li>
                                <li class="list-group-item border-0 ps-0 pb-2">
                                    <strong>Social Media:</strong> Planejamento mensal, análises de resultado,
                                    calendário e execução.
                                </li>
                            </ul>
                        </div>

                        <div>
                            <div class="mb-3">
                                <span class="badge bg-light text-dark border rounded-pill me-1">UX Premium</span>
                                <span class="badge bg-light text-dark border rounded-pill me-1">Automação</span>
                                <span class="badge bg-light text-dark border rounded-pill">Alta Performance</span>
                            </div>
                            <?php if(!estaLogado()):?>
                            <a href="src/pages/login.php"
                                class="btn btn-primary w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                                Adquira Já
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                            <?php else : ?>
                            <a href="src/pages/faleconosco.php"
                                class="btn btn-primary w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
                                Adquira Já
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======== feature-section end ======== -->


    <div id="empresa" class="header_hero">
        <ul id="redes" class="header_social d-none d-lg-block">
            <li><a href="#"><i class="bi bi-whatsapp"></i></a></li>
            <li><a href="#"><i class="bi bi-github"></i></a></li>
            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
        </ul>
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="header_hero_content mt-45">
                        <div class="hero-texts">
                            <h5 class="header_sub_title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                Espera</h5>
                            <h2 class="header_title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                                Você
                                sabe quem é a Aurora Ability?</h2>
                            <span class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">A Aurora
                                Ability
                                nasceu de um grupo de jovens estudantes, cada um com sua perspectiva única e
                                experiências diversas.</span>
                            <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s">Unidos por um
                                propósito comum, eles decidiram transformar o mundo digital em um espaço mais
                                acessível
                                e acolhedor para todos. As ideias inovadoras de cada um, combinadas com a paixão por
                                criar um ambiente digital inclusivo, deram origem à Aurorability, uma empresa que
                                busca
                                fazer a diferença na vida de todos os usuários.</p>
                            <div class="buttons">
                                <a href="https://rebrand.ly/freelancer-ud" rel="nofollow"
                                    class="main-btn-one wow fadeInUp" data-wow-duration="1.3s"
                                    data-wow-delay="1.4s">Saiba Mais</a>
                                <a href="#servicos" rel="nofollow" class="main-btn-two wow fadeInUp"
                                    data-wow-duration="1.3s" data-wow-delay="1.4s">Nossos Serviços</a>
                            </div>
                        </div>
                    </div> <!-- header hero content -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-7">
                    <div class="header_hero_image mt-50 wow fadeInRightBig" data-wow-duration="1.3s"
                        data-wow-delay="1.8s">
                        <img src="src/img/image.png" alt="hero">
                    </div> <!-- header hero image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="header_hero_shape d-none d-lg-block"></div> <!-- header hero shape -->
    </div> <!-- header hero -->

    <!-- Blog Section -->
    <section class="section">
        <h2>Nossos Projetos</h2>
        <p>Conheça outros projetos nossos</p>
        <div class="blogs">
            <div class="blog-card">
                <img src="src/img/projetos/projeto1.jpeg" alt="Blog 1">
                <div class="blog-tags"><span>Design</span><span>Engineering</span></div>
                <div class="blog-content">
                    <h3>Website Computação Quântica</h3>
                    <p>Website que é a base de uma introdução aos conhecimentos sobre a computação quÂntica</p>
                    <div class="blog-footer">
                        <span>👤 Alex Demo</span>
                        <span>📅 25 Mar, 2025</span>
                    </div>
                </div>
            </div>
            <div class="blog-card">
                <img src="src/img/projetos/projeto2.jpeg" alt="Blog 2">
                <div class="blog-tags"><span>Development</span><span>Security</span></div>
                <div class="blog-content">
                    <h3>Website de jogos</h3>
                    <p>Website de desenvolvimento de jogos.</p>
                    <div class="blog-footer">
                        <span>👤 Hendary Jonson</span>
                        <span>📅 12 Feb, 2025</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- <section class="planos">
        <h2>Nossos Planos</h2>
        <div class="cards">
            <div class="card">
                <h3>Plano Essencial</h3>
                <p>Ideal para quem está começando. Acessibilidade básica incluída.</p>
            </div>
            <div class="card destaque">
                <h3>Plano Profissional</h3>
                <p>Design avançado + recursos para diversos tipos de deficiência.</p>
            </div>
            <div class="card">
                <h3>Plano Premium</h3>
                <p>Projeto completo, consultoria inclusiva e manutenção contínua.</p>
            </div>
        </div>
    </section> -->

    <footer class="footer">
        <p>&copy; 2025 Aurora Ability IT. Todos os direitos reservados.</p>
        <p>Desenvolvido com foco em acessibilidade digital.</p>
    </footer>

    <!-- JSs -->

    <script src="src/js/mod.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>