<?php require_once("banco/conexao.php"); ?>

<?php
    // teste de segurança
    session_start();
    if ( isset($_SESSION["user_portal"]) ) {

        header("location:entrar");
    }
    // fim do teste de seguranca

    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

    // Consulta ao banco de dados
    $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
    $produtos .= "FROM produtos ";
    if ( isset($_GET["produto"]) ) {
        $nome_produto = $_GET["produto"];
        $produtos .= "WHERE nomeproduto LIKE '%{$nome_produto}%' ";
    }
    $resultado = mysqli_query($conexao, $produtos);
    if(!$resultado) {
        die("Falha na consulta ao banco");   
    }
?>

<main>
    <div id="janela_pesquisa">
        <form action="listagem" method="get">
            <input type="text" name="produto" placeholder="Pesquisa">
            <input type="image" src="_assets/botao_search.png">
        </form>
    </div>

    <div id="cursos">
        <?php
        while ($linha = mysqli_fetch_assoc($resultado)) {
        ?>
            <ul>
                <li class="imagem">
                    <a href="visualizar?codigo=<?php echo $linha['produtoID'] ?>">
                        <img src="<?php echo $linha["imagempequena"] ?>">
                    </a>
                </li>
                <li>
                    <h3><?php echo $linha["nomeproduto"] ?></h3>
                </li>
                <li>Carga Horaria : <?php echo $linha["tempoentrega"] ?></li>
                <!-- <li>Pre&ccedil;o unit&aacute;rio : <?php //echo money_format('%.2n',$linha["precounitario"]) 
                                                        ?></li> -->
            </ul>
        <?php
        }
        ?>
    </div>

</main>

<?php
// Fechar conexao
mysqli_close($conexao);
?>