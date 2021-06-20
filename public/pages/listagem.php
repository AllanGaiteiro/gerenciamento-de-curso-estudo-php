<?php require_once("banco/conexao.php"); ?>

<?php
// teste de segurança

// fim do teste de seguranca

// Determinar localidade BR
setlocale(LC_ALL, 'pt_BR');

// Consulta ao banco de dados
$produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
$produtos .= "FROM produtos ";
if (isset($_GET["produto"])) {
    $nome_produto = $_GET["produto"];
    $produtos .= "WHERE nomeproduto LIKE '%{$nome_produto}%' ";
}
$resultado = mysqli_query($conexao, $produtos);
if (!$resultado) {
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primeiro</th>
                    <th scope="col">Carga Horaria</th>
                    <th scope="col">Nickname</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($linha = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $linha['produtoID'] ?></th>
                        <td><?php echo $linha["nomeproduto"] ?></td>
                        <td><?php echo $linha["tempoentrega"] ?></td>
                        <td><a href="visualizar?codigo=<?php echo $linha['produtoID'] ?>">
                                <img src="<?php echo $linha["imagempequena"] ?>">
                            </a></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</main>

<?php
// Fechar conexao
mysqli_close($conexao);
?>