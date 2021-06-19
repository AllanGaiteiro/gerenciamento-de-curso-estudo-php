<?php require_once("banco/conexao.php"); ?>

<?php
// teste de segurança
session_start();
if (!isset($_SESSION["user_portal"])) {
    header("location:login.php");
}
// fim do teste de seguranca

// Determinar localidade BR
setlocale(LC_ALL, 'pt_BR');

// Consulta ao banco de dados
$produtos = "SELECT idCurso, nome, logo, nota, cargaHoraria, descricao, cursourl";
$produtos .= "FROM cursos ";
if (isset($_GET["curso"])) {
    $nome_produto = $_GET["curso"];
    $produtos .= "WHERE nome LIKE '%{$nome_produto}%' ";
}
$resultado = mysqli_query($conexao, $produtos);
if (!$resultado) {
    die("Falha na consulta ao banco");
}
?>

<main>
    <div id="janela_pesquisa">
        <form action="listagem.php" method="get">
            <input type="text" name="curso" placeholder="Pesquisa">
            <input type="image" src="_assets/botao_search.png">
        </form>
    </div>

    <div id="cursos">
        <?php
        while ($linha = mysqli_fetch_assoc($resultado)) {
        ?>
            <ul>
                <li class="imagem">
                    <a href="detalhe.php?codigo=<?php echo $linha['idCurso'] ?>">
                        <img src="<?php echo $linha["logo"] ?>">
                    </a>
                </li>
                <li>
                    <h3><?php echo $linha["nome"] ?></h3>
                </li>
                <li>Carga Horaria : <?php echo $linha["cargaHoraria"] ?></li>
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