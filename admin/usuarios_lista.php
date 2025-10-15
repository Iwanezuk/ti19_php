<?php 
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
//selecionar os dados
$consulta   = "
            SELECT *
            FROM tbusuarios
            ORDER BY login_usuario ASC;  
            "; //confirmar o order by
//Fazer a lista completa dos dados
$lista  = $conn_produtos->query($consulta);
//Separar os dados em linhas (row)
$row    = $lista->fetch_assoc();
//Contar o total de linhas
$totalRows  = ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Lista</title>
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
     <!-- link para css especifico -->
      <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
    <?php include("menu_adm.php"); ?>
<main class="container">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"> <!--dimensionamento-->
    <h1 class="breadcrumb alert-info">Lista de Usuários</h1>
    <div class="btn btn-info disabled">
        Total de Usuários:
        <small class="badge"><?php echo $totalRows?></small>
    </div>
<table class="table table-hover table-condensed tbopacidade">
    <thead>
        <tr>
            <th>ID</th>
            <th>LOGIN</th>
            <th>NÍVEL</th>
            <th>
            <a 
                    href="usuarios_insere.php"
                    target="_self"
                    class="btn btn-primary btn-xs btn-block"
                    >
                        <span class="hidden-xs">ADICIONAR <br></span>
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
            </th>
        </tr>
    </thead>
        <tbody>
            <!-- abre a estrutura de repetição -->
            <?php do{ ?>
            <tr>
                <td><?php echo $row['id_usuario'];?></td>
                <td><?php echo $row['login_usuario'];?></td>
                <td>
                <?php 
                        if($row['nivel_usuario'] == 'sup'){
                            echo('<span class="glyphicon glyphicon-sunglasses text-black"></span>');
                        } else  if($row['nivel_usuario'] == 'com'){
                            echo('<span class="glyphicon glyphicon-user text-info"></span>');
                        };
                    ?>
                    <?php echo $row['nivel_usuario']; ?>
                </td>
                <td><a 
                    href="usuarios_atualiza.php"
                    target="_self"
                    class="btn btn-warning btn-xs btn-block"
                    >
                        <span class="hidden-xs">ALTERAR <br></span>
                        <span class="glyphicon glyphicon-refresh"></span>
                    </a>
                    <button
                    class="btn btn-danger btn-xs btn-block delete"
                    >
                        <span class="hidden-xs">EXCLUIR<br></span>
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
            <?php }while($row = $lista->fetch_assoc());?>
            <!-- fecha a estrutura de repetição -->
        </tbody> 
</table>
    </div> <!--fecha dimensionamento-->

</main>
 <!-- link arquivos bootstrap js -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista);?>