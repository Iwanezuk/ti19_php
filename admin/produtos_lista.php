<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

// Selecionar os dados
$consulta   =   "
                SELECT  *
                FROM    tbprodutos
                ORDER BY descri_produto ASC;
                ";
// Fazer uma lista completa dos dados
$lista      =   $conn_produtos->query($consulta);
// Separar os dados em linhas (row)
$row        =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - lista</title>
    <!-- Link CSS do Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS Específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
<?php include("menu_adm.php"); ?>
<!-- main>h1 -->
<main>
    <h1>Lista de Produtos</h1>
    <div>
        Total de produtos:
        <small><?php echo $totalRows; ?></small>
    </div>
    <!-- table>thead>tr>th*8 -->
    <table border="1">
        <thead> <!-- Cabeçalho da tabela -->
            <tr> <!-- linha da tabela -->
                <th>ID</th> <!-- célula de cabeçalho -->
                <th>TIPO</th>
                <th>DESTAQUE</th>
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>
                    <a href="produtos_insere.php">ADICIONAR</a>
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*8 -->
        <tbody>
            <!-- Abre a estrutura de repetição -->
            <?php do{ ?>
            <tr>
                <td><?php echo $row['id_produto']; ?></td>
                <td><?php echo $row['id_tipo_produto']; ?></td>
                <td><?php echo $row['destaque_produto']; ?></td>
                <td><?php echo $row['descri_produto']; ?></td>
                <td><?php echo $row['resumo_produto']; ?></td>
                <td><?php echo $row['valor_produto']; ?></td>
                <td>
                    <!-- 
                        Para exibir uma imagem insira em 'src'
                        o diretório que ela está armazenada e
                        a variável com seu nome.
                     -->
                    <img 
                        src="../imagens/<?php echo $row['imagem_produto']; ?>" 
                        alt="<?php echo $row['descri_produto']; ?>"
                        width="100px"
                    >
                </td>
                <td>ALTERAR|EXCLUIR</td>
            </tr>
            <?php }while($row = $lista->fetch_assoc());  ?>
            <!-- Fechar a estrutura de repetição -->
        </tbody>
    </table>
</main>

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>    
</body>
</html>
<?php mysqli_free_result($lista); ?>