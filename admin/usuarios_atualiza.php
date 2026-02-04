<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

//Variaveis Globais
$tabela = "tbusuarios";
$campo_filtro = "id_usuario";

if($_POST){
    // Definindo o USE do banco de dados;
    mysqli_select_db($conn_produtos,$database_conn);

    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $login_usuario  =  $_POST["login_usuario"];
    $senha_usuario  =  $_POST["senha_usuario"];
    $nivel_usuario  =  $_POST["nivel_usuario"];

     //Campo para filtrar o registro (WHERE)

     $filtro_update = $_POST['id_usuario'];


    // Consulta SQL para ATUALIZAÇÃO dos dados
    $updateSQL  =   "
                    UPDATE ".$tabela."
                    SET
                       login_usuario     =   '".$login_usuario."',
                       senha_usuario     =   '".$senha_usuario."',
                       nivel_usuario     =   '".$nivel_usuario."'
                       WHERE ".$campo_filtro." =   '".$filtro_update."';
                    ";
    $resultado  =   $conn_produtos->query($updateSQL);

    // Após a ação a página será redirecionada
    $destino    =   "usuarios_lista.php";
    if(mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
//Consulta para trazer e filtrar as dados
//Definindo o USE do banco de dados
mysqli_select_db($conn_produtos, $database_conn);
$filtro_select = $_GET['id_usuario'];
$consulta = "
                    SELECT *
                    FROM ".$tabela."
                    WHERE ". $campo_filtro."=".$filtro_select.";
                    ";
$lista       =  $conn_produtos->query($consulta);
$row         =  $lista->fetch_assoc();
$totalRows   =  ($lista)->num_rows;

// Selecionar o banco de dados
mysqli_select_db($conn_produtos,$database_conn);
?>


<!doctype html>
<html lang="pt-br">

<head>
    <title>Usuário - Atualiza</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Aqui vai o Bootstrap -->
     <!-- Bootstrap -->
     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Específico -->
    <link href="../css/meu_estilo.css" rel="stylesheet">
</head>

  <body class="fundofixo">
    <?php include("menu_adm.php"); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 
        col-md-4">
                <h2 class="breadcrumb text-info ">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-info " type="button">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        </button>
                    </a>
                    Atualizando Usuarios
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-info">
                        <form action="usuarios_atualiza.php"
                         name="form_atualiza_usuarios" 
                         id="form_atualiza_usuarios"
                        method="post"
                        enctype="multipart/form-data"
                        >
                        <!-- input type="hidden" >> campo oculto armazena dados -->
                            <!-- armazena o nome da imagem caso não seja alterada -->
                            <input 
                                type="hidden"
                                name="id_usuario"
                                id="id_usuario"
                                value="<?php echo $row['id_usuario']; ?>"
                            >
                            <!-- input login_usuario -->
                            <label for="login_usuario">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text"
                                 name="login_usuario"
                                id="login_usuario"
                                maxlength="30"
                                placeholder="Digite seu Usuario"
                                required 
                                class="form-control"
                                value="<?php echo $row['login_usuario']; ?>"
                                >
                            </div> <!-- fecha input-group login_usuario-->

                            <br>

                            <!-- input senha_usuario -->
                            <label for="senha_usuario">Senha</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span>
                                </span>
                                <input type="password" 
                                name="senha_usuario" 
                                id="senha_usuario"
                                placeholder="Digite sua Senha" 
                                maxlength="8"
                                required
                                autocomplete="off"
                                class="form-control "
                                value="<?php echo $row['senha_usuario']; ?>"
                                >
                            </div> <!-- fecha input-group login_usuario-->

                          <!-- radio nivel_usuario -->
                          <label for="nivel_usuario">Destaque?</label>
                            <div class="input-group ">
                                <label for="nivel_usuario_c" class="radio-inline">
                                    <input type="radio" name="nivel_usuario" id="nivel_usuario" value="com"
                                    <?php echo $row['nivel_usuario']=="com"? "checked" : null; ?>>
                                    Comum
                                </label>
                                <label for="nivel_usuario_s" class="radio-inline">
                                    <input type="radio" name="nivel_usuario" id="nivel_usuario" value="sup"
                                    <?php echo $row['nivel_usuario']=="sup"? "checked" : null; ?>>
                                    Superior
                                </label>
                            </div> <!-- fecha input group -->
                            <!-- fecha radio nivel_usuario -->

                            <br>

                            <!-- btn atualizar -->
                            <input
                            type="submit"
                            value="Atualizar"
                            role="button"
                            name="enviar"
                            id="enviar"
                            class="btn btn-block btn-info"
                        >

                    </div> <!-- fecha alert -->
                </div> <!-- fecha tumbnaill -->
            </div> <!-- fecha dimensionamento -->
        </div> <!-- fecha row -->
    </main>


    <!-- Link arquivos Bootstrap js -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
<?php mysqli_free_result($lista); ?> 
</html>