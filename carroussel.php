<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="banners" class="carousel slide" data-ride="carousel">
    <!-- Indicador dos itens -->
    <ol class="carousel-indicators">
        <li data-target="#banners" data-slide-to="0" class="active"></li>
        <li data-target="#banners" data-slide-to="1"></li>
        <li data-target="#banners" data-slide-to="2"></li>
    </ol>

    <!-- imagens -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="imagens/banner_1.jpg" alt="" class="center-block">
        </div> <!-- fecha item -->
        <div class="item">
            <img src="imagens/banner_2.jpg" alt="" class="center-block">
        </div> <!-- fecha item -->
        <div class="item">
            <img src="imagens/banner_3.jpg" alt="" class="center-block">
        </div> <!-- fecha item -->

        <!-- botões de navegação -->
        <a 
            href="#banners"
            class="left carousel-control"
            role="button"
            data-slide="prev"
        >
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a 
            href="#banners"
            class="right carousel-control"
            role="button"
            data-slide="next"
        >
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div> <!-- fecha carousel-inner -->

</div> <!-- fecha banners/carroussel -->
    
</body>
</html>