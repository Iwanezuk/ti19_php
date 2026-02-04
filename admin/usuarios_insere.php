<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

if($_POST){
  // Definir o USE do banco de dados
  mysqli_select_db($conn_produtos,$database_conn);

  // Variáveis para acrescentar dados ao banco
  $tabela_insert  = "tbusuarios";
  $campos_insert  = "login_usuario, senha_usuario, nivel_usuario";

  // Receber os dados do formulário
  // Organize os campos na mesma ordem
  $login_usuario  = $_POST['login_usuario'];
  $senha_usuario =  $_POST ['senha_usuario'];
  $nivel_usuario =  $_POST ['nivel_usuario'];
  // Reunir os valores a serem inserido
  $valores_insert = "'$login_usuario','$senha_usuario','$nivel_usuario'";

  // Consulta SQL para inserção dos dados
  $insertSQL  = "
                INSERT INTO ".$tabela_insert."
                  (".$campos_insert.")
                VALUES
                  (".$valores_insert.");
                ";
  $resultado  = $conn_produtos->query($insertSQL);

  // Após a ação a página será redirecionada
  $destino    = "usuarios_lista.php";
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
    <title>Inserindo Usuários</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Específico -->
    <link href="../css/meu_estilo.css" rel="stylesheet">
  </head>
  <body class="fundofixo">
<?php include("menu_adm.php"); ?>
  <main class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"> <!-- dimensionamento -->
        <h2 class="breadcrumb text-info">
          <a href="usuarios_lista.php">
            <button class="btn btn-info">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </button>
          </a>
          Inserindo Usuários
        </h2>
        <div class="thumbnail">
          <div class="alert alert-info">
            <form 
              action="usuarios_insere.php"
              name="form_insere_tipo"
              id="form_insere_tipo"
              method="post"
              enctype="multipart/form-data"
            >
              <!-- Input login_usuario -->
              <label for="login_usuario">Login</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </span>
                <input 
                  type="text"
                  name="login_usuario"
                  id="login_usuario"
                  class="form-control"
                  autofocus
                  maxlength="15"
                  required
                  placeholder="Digite seu login."
                >
              </div> <!-- fecha input-group -->
              <br>
              <!-- Input senha_usuario -->
              <label for="senha_usuario">Senha</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span>
                </span>
                <input 
                  type="text"
                  name="senha_usuario"
                  id="senha_usuario"
                  class="form-control"
                  maxlength="3"
                  required
                  placeholder="Digite sua senha."
                >
              </div> <!-- fecha input-group -->
              
<br>
              <!-- radio destaque_produto -->
              <label for="nivel_usuario">Nível Usuário</label>
              <div class="input-group">
                <label for="nivel_usuario_c" class="radio-inline">
                  <input 
                    type="radio" 
                    name="nivel_usuario" 
                    id="nivel_usuario"
                    value="com"
                  >Comum
                </label>
                <label for="nivel_usuario_n" class="radio-inline">
                  <input 
                    type="radio" 
                    name="nivel_usuario" 
                    id="nivel_usuario"
                    value="sup"
                    checked
                  >Supervisor
                </label>
              </div> <!-- fecha input-group -->
              <!-- fecha radio destaque_produto -->
              <br>
              <!-- btn enviar -->
              <input 
                type="submit"
                value="Cadastrar"
                name="enviar"
                id="enviar"
                role="button"
                class="btn btn-block btn-info"
              >
            </form>
          </div> <!-- fecha alert -->
        </div> <!-- fecha thumbnail -->
      </div> <!-- fecha dimensionamento -->
    </div> <!-- fecha row -->
  </main>

    <!-- JavaScript do Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>