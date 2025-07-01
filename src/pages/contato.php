<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Aurora Ability IT</title>


    <!-- LINKS BOOTSTRAP -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="../css-globais/navbar.css">
    <link rel="stylesheet" href="../css-globais/footer.css">

    <!-- CSS DA PÁGINA -->
    <link rel="stylesheet" href="../css/contato.css">

    <!-- CSS RESPONSIVO -->
    <link rel="stylesheet" href="../css/responsivo.css">

    <script src="../js/acessibilidade.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <nav class="navbar">
        <div class="logo">Aurora Ability IT</div>
        <ul class="menu">
            <li><a href="index.php">Início</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="planos.php">Planos</a></li>
            <li><a href="acessibilidade.php">Acessibilidade</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
    </nav>

    <main class="contato">
        <section class="formulario">
            <h1>Fale conosco</h1>
            <p>Entre em contato para solicitar um orçamento, tirar dúvidas ou saber mais sobre nossos planos.</p>

            <form action="#" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </section>

        <section class="info">
            <h2><i class='bx bx-envelope'></i> contato@auroraability.com</h2>
            <h2><i class='bx bx-phone'></i> (21) 99999-0000</h2>
            <p>Atendimento de segunda a sexta, das 9h às 18h.</p>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2025 Aurora Ability IT. Todos os direitos reservados.</p>
        <p>Desenvolvido com foco em acessibilidade digital.</p>
    </footer>
</body>

</html>