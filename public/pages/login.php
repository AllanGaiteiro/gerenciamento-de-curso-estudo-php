<div class="card w-50 m-auto">
    <form action="entrar" method="POST" class="card-body">

        <h5 class="card-title">Entrar</h5>

        <div class="form-group">
            <label for="login">login</label>
            <input type="text" class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" value="Login">Login</button>
        <?php
        if (isset($mensagem)) {
        ?>
            <p><?php echo $mensagem;
                ?></p>

        <?php
        }
        ?>
    </form>
</div>