<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo</title>
    <!-- Link CSS do Bootstrap 
    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <!-- Link para CSS Específico 
    <link rel="stylesheet" href="css/meu_estilo.css">-->
</head>
<body class="fundofixo">
<div class="row panel-footer" style="background-color:rgba(255, 255, 255, 0.6);"> <!-- abre painel de rodapé -->

<!-- ÁREA DE LOCALIZAÇÃO -->
<div class="col-sm-6 col-md-4" >
    <div class="panel-footer" style="background:none;">
        <img src="imagens/logochurrascopequeno.png" alt="">
        <br>
        <i>O melhor churrasco da região!</i>
        <address>
            <i>Rua Dom Joaquim, 495 - Centro - Itapetininga - SP - CEP 18200-000</i>
            <br>
            <span class="glyphicon glyphicon-phone-alt"></span>
            &nbsp;Fone: (15) 3511 1200
            <br>
            <span class="glyphicon glyphicon-envelope"></span>
            &nbsp;E-mail:
            <a 
                href="mailto:contato@chuletaquente.com.br?subject=Contato&cc=seuemail@mail.com"
            >
                contato@chuletaquente.com.br
            </a>
            <div class="embed-responsive embed-responsive-16by9"> <!-- mapa -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.3526027249522!2d-48.05764850321044!3d-23.5916841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cc93b46246ed%3A0x6ec0870ce87bb6fd!2sSenac%20Itapetininga!5e0!3m2!1spt-BR!2sbr!4v1761610404615!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> <!-- fecha mapa -->
        </address>
    </div> <!-- fecha panel-footer --> 
</div> <!-- fecha dimensionamento / área -->

<!-- ÁREA DE NAVEGAÇÃO -->
<div class="col-sm-6 col-md-4" >
    <div class="panel-footer" style="background:none;">
        <h4>LINKS</h4>
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="index.php#home" class="text-danger">
                    <span class="glyphicon glyphicon-home">&nbsp;HOME</span>
                </a>
            </li>
            <li>
                <a href="index.php#destaques" class="text-danger">
                    <span class="glyphicon glyphicon-fire">&nbsp;DESTAQUES</span>
                </a>
            </li>
            <li>
                <a href="index.php#produtos" class="text-danger">
                    <span class="glyphicon glyphicon-cutlery">&nbsp;PRODUTOS</span>
                </a>
            </li>
            <li>
                <a href="produtos_tipos.php" class="text-danger">
                    <span class="glyphicon glyphicon-tasks">&nbsp;TIPOS</span>
                </a>
            </li>
            <li>
                <a href="index.php#contato" class="text-danger">
                    <span class="glyphicon glyphicon-send">&nbsp;CONTATO</span>
                </a>
            </li>
            <li>
                <a href="admin/index.php" class="text-danger">
                    <span class="glyphicon glyphicon-user">&nbsp;ADMINISTRAÇÃO</span>
                </a>
            </li>
        </ul>
    </div> <!-- fecha panel-footer --> 
</div> <!-- fecha dimensionamento / área -->

<!-- ÁREA DE CONTATO -->
<div class="col-sm-6 col-md-4" >
    <div class="panel-footer" style="background:none;">
        <h4>CONTATO</h4>
        <form 
            action="rodape_contato_envia.php"
            name="form_contato"
            id="form_contato"
            method="post"
        >
            <!-- input group NOME -->
            <p>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">
                        <span class="glyphicon glyphicon-user"></span>
                    </span>
                    <input 
                        type="text"
                        name="nome_contato"
                        id="nome_contato"
                        placeholder="Digite seu nome."
                        aria-describedby="basic-addon1"
                        required
                        class="form-control"
                    >
                </div> <!-- fecha input-group -->
            </p>

           <!-- construa o input group email use glyphicon-envelope -->
           <p>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                    <span class="glyphicon glyphicon-envelope"></span>
                </span>
                <input 
                    type="email" 
                    name="email_contato" 
                    id="email_contato" 
                    placeholder="Digite seu email" 
                    aria-describedby="basic-addon2" 
                    required 
                    class="form-control"
                >
            </div>
            </p>    
            <!-- construa o textarea comentários use glyphicon-pencil -->
            <p>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </span>
                    <textarea 
                        name="comentarios_contato" 
                        id="comentarios_contato" 
                        cols="30" 
                        rows="5" 
                        placeholder="Comentários, dúvidas e/ou sugestões."
                        aria-describedby="basic-addon3" 
                        required 
                        class="form-control"
                    ></textarea>
                </div>
            </p>
            <!-- construa o botão enviar use glyphicon-send -->     
            <p>
                <button class="btn btn-danger btn-block" aria-label="Enviar">
                    Enviar
                    <span class="glyphicon glyphicon-send"></span>
                </button>
            </p>
        </form>
    </div> <!-- fecha panel-footer --> 
</div> <!-- fecha dimensionamento / área -->

<!-- ÁREA DE DESENVOLVEDOR -->
<div class="col-sm-12" >
    <div class="panel-footer" style="background:none;">
        <h6 class="text-danger text-center">
            Developed by Iwanezuk&trade; 2025
            <br>
            <a href="https://www.iwanezuk.com.br">
                www.iwanezuk.com.br
            </a>
        </h6>
    </div> <!-- fecha panel-footer --> 
</div> <!-- fecha dimensionamento / área -->    

</div> <!-- fecha painel principal do rodapé -->

<!-- Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->    
</body>
</html>