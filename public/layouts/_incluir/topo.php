<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Gerenciamento de Cursos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php global $urlInit;
                                  echo $urlInit; ?>/home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php global $urlInit;
                                  echo $urlInit; ?>/listagem">listagem</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php global $urlInit;
                                  echo $urlInit; ?>/contato">Contato</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="<?php global $urlInit;
                                            echo $urlInit; ?>/sobre">Disabled</a>
      </li>
    </ul>
  </div>
</nav>