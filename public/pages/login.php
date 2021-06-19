
<?php require_once("banco/conexao.php"); ?>

<?php
// adicionar variaveis de sessao
session_start();


if (isset($_POST["login"])) {
    echo $_POST["login"];
    $usuario    = $_POST["login"];
    $senha      = $_POST["password"];

    $verification = "SELECT * ";
    $verification .= "FROM clientes ";
    $verification .= "WHERE usuario = '{$usuario}' and senha = '{$senha}' ";

    $acesso = mysqli_query($conexao, $verification);
    if (!$acesso) {
        die("Falha na consulta ao banco");
    }

    $informacao = mysqli_fetch_assoc($acesso);

    if (empty($informacao)) {
        $mensagem = "Login sem sucesso.";
    } else {
        $_SESSION["user_portal"] = $informacao["clienteID"];
        header("location:listagem.php");
    }
}
?>


<div class="card w-50 m-auto">
    <form action="login.php" method="POST" class="card-body">

        <h5 class="card-title">Entrar</h5>

        <div class="form-group">
            <label for="login">login</label>
            <input type="text" class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary"  value="Login">Login</button>
        <?php
        if (isset($mensagem)) {
        ?>
            <p><?php echo $mensagem;
            mysqli_close($conexao);
            ?></p>

        <?php
        }
        ?>
    </form>
</div>

<?php
// Fechar conexao

?>