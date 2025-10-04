<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

if($_POST){
    // Selecionar o banco de dados (USE)
    mysqli_select_db($conn_produtos,$database_conn);

    // Variáveis para acrescentar dados no banco
    $tabela_insert  =   "tbusuarios";
    $campos_insert  =   "
                            login_usuario,
                            senha_usuario,
                            nivel_usuario
                            
                        ";

    // Receber os dados do formulário
    // Organizar os campos na mesma ordem
    $login_usuario     =   $_POST['login_usuario'];
    $senha_usuario     =   $_POST['senha_usuario'];
    $nivel_usuario     =   $_POST['nivel_usuario'];     
    

    // Reunir os valores a serem inseridos
    $valores_insert =   "
                        '$login_usuario',
                        '$senha_usuario',
                        '$nivel_usuario'
                        ";

    // Consulta SQL para inserção dos dados
    $insertSQL  =   "
                    INSERT INTO ".$tabela_insert."
                        (".$campos_insert.")
                    VALUES
                        (".$valores_insert.");
                    ";
    $resultado  =   $conn_produtos->query($insertSQL);

    // Após a ação a página será redirecionada
    $destino    =   "usuarios_lista.php";
    if(mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos Usuarios</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
<?php include("menu_adm.php"); ?>
<main class="container">
    <div> <!-- abre row -->
        <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4" > <!-- abre dimensionamento -->
            <h2 class="breadcrumb text-info">
                <a href="usuarios_lista.php">
                    <button class="btn btn-info">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Inserindo Usuários
            </h2>
            <div class="thumbnail"> <!-- thumbnail -->
                <div class="alert alert-info" role="alert"> <!-- alert -->
                    <form 
                        action="usuarios_insere.php"
                        enctype="multipart/form-data"
                        method="post"
                        id="form_usuario_tipo"
                        name="form_usuario.tipo"
                    >
                    

                         <!-- text login_usuario -->
                         <label for="login_usuario">Login:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input 
                                type="text" 
                                name="login_usuario" 
                                id="login_usuario"
                                class="form-control"
                                placeholder="Digite o seu login."
                                maxlength="30"
                                required
                            >
                        </div> <!-- fecha input-group -->
                        <!-- fecha text login_usuario -->
                        
                        <br>

                        <!-- text senha_usuario -->
                        <label for="senha_usuario">Senha: </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-qrcode"></span>
                            </span>
                            <input 
                                type="password" 
                                name="senha_usuario" 
                                id="descri_produto"
                                class="form-control"
                                placeholder="Digite a senha desejada."
                                maxlength="8"
                                required
                            >
                        </div> <!-- fecha input-group -->
                        <!-- fecha text senha_usuario -->

                        <br>

                        <!-- radio nivel_usuario -->
                        <label for="nivel_usuario_c">Nível do usuário?</label>
                        <div class="input-group">
                            <label 
                                for="nivel_usuario_c"
                                class="radio-inline"
                            >
                                <input 
                                    type="radio"
                                    name="nivel_usuario"
                                    id="nivel_usuario"
                                    value="com"
                                >
                                    Comum
                            </label>
                            <label 
                                for="nivel_usuario_s"
                                class="radio-inline"
                            >
                                <input 
                                    type="radio"
                                    name="nivel_usuario"
                                    id="nivel_usuario"
                                    value="sup"
                                    checked
                                >
                                Supervisor
                            </label>
                        </div> <!-- fecha input-group -->
                        <!-- fecha radio nivel_usuario -->
                        <br>

                    
                        <!-- btn enviar -->
                         <input 
                            type="submit" 
                            value="Cadastrar"
                            name="enviar"
                            id="enviar"
                            role="button"
                            class="btn btn-info btn-block"
                         >
                    </form>

                </div> <!-- fecha alert -->
            </div> <!-- fecha thumbnail -->
        </div> <!-- fecha dimensionamento -->
    </div> <!-- fecha row -->
</main>



<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>    
</body>
</html>