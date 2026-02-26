<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuleta Quente</title>
</head>
<body class="fundofixo">
    <!-- MENU -->
    <a name="home"></a>
    <?php include('menu_publico.php'); ?>

    <main class="container">
        <!-- CARROUSSEL -->
        <?php include('carroussel.php'); ?>

        <!-- DESTAQUES -->
        <a name="destaques"></a>
        <hr>
        <?php include('produtos_destaque.php'); ?>

        <!-- PRODUTOS -->
        <a name="produtos"></a>
        <hr>
        <?php include('produtos_geral.php'); ?>

        <!-- RODAPÉ -->
        <footer>
            <?php include('rodape.php'); ?>
            <a name="contato"></a>
        </footer>
    </main>
</body>
</html>