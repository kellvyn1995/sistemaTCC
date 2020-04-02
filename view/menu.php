<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#"> <img src="../libs/img/logo04menor.png" alt="25x25"> </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php?pg=index">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view/ajuda.php">Ajuda</a>
            </li>

            <!--se tive uma sessão mostra nome do usuario-->

            <?php if (isset($_SESSION['nome']) && !empty($_SESSION['nome'])): ?>
              <!--se não tive uma sessão, não mostra nome do usuario-->
              <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Bem vindo! <?php echo $_SESSION['nome']; ?></a>
              </li>
            <?php endif; ?>

            <?php if (empty($_SESSION['nome'])): ?>
              <!--se não tive uma sessão, não mostra nome do usuario-->
              <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Bem vindo!</a>
              </li>
            <?php endif; ?>

        </ul>

        <form class="form-inline my-2 my-lg-0 mr-3">
            <input class="form-control mr-sm-2" type="search" placeholder="Digite o que procura" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisa</button>
        </form>

        <!--menu logado-->
        <?php if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções de usuario
              </button>
              <div class="dropdown-menu">
                <?php if (isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])): ?>
                  <a class="dropdown-item" href="../view/meuPerfil.php">Meu perfil</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])): ?>
                  <a class="dropdown-item" href="../view/atualizarHabilitado.php?pg=atualizarHabilitado">Editar perfil</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])): ?>
                  <a class="dropdown-item" href="../view/agenda.php?pg=agenda">Agenda</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])): ?>
                  <a class="dropdown-item" href="../view/menssagem.php?pg=menssagem">Menssagens</a>
                <?php endif; ?>
                <?php if (empty($_SESSION['id_habilitado'])): ?>
                  <a class="dropdown-item" href="../view/cadastrohabilitado.php?pg=cadastrohabilitado">Quero ser <br> uma habiltado</a>
                <?php endif; ?>
                <?php if ($_SESSION['idUser'] == 1): ?>
                  <a class="dropdown-item" href="../view/admin.php">Admin</a>
                <?php endif; ?>
                <a class="dropdown-item" href="../view/atualizar_cadastro.php">Atualizar <br> cadastrar</a>
                <a class="dropdown-item" href="../controller/logout.php">Sair</a>
              </div>
            </div>

        <?php endif; ?>
        <?php if (isset($_SESSION['idUser']) == false): ?>
          <a type="button" class="btn btn-success" href="../view/login.php?pg=login">Entra</a>
        <?php endif; ?>
    </div>
</nav>
