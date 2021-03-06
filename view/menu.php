<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#"> <img src="../libs/img/logo04menor.png" alt="25x25"> </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view/ajuda.php">Ajuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../view/sobre.php">Sobre</a>
            </li>
            <?php if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser']) && !isset($_SESSION['id_habilitado']) && empty($_SESSION['id_habilitado'])): ?>
              <li class="nav-item">
                  <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSfMT5iUyjUtPBYlShgT7YenGvR5ggGgoAFFXkoQVHf360e6xQ/viewform?usp=sf_link">Formulário de avaliação </a>
              </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])): ?>
              <li class="nav-item">
                  <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSd8Q2CAMGVELYZJg5q9SKVc3UTRDTybVAKf7LIITdG26_9ZlQ/viewform?usp=sf_link">Formulário de avaliação </a>
              </li>
            <?php endif; ?>


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

        <form class="form-inline my-2 my-lg-0 mr-3" method="post" action="../index.php">
            <input class="form-control mr-sm-2" type="search" name="buscar" placeholder="Digite o que procura" aria-label="Search" data-toggle="tooltip" data-placement="top" title="exemplos de busca: modelo carlos, modelos ou #moda">
            <button class="btn btn-outline-success my-2 my-sm-0" name="btbusca" type="submit">Pesquisa</button>
            <input type="hidden" name="env" value="envBusca">
        </form>

        <!--menu logado-->
        <?php if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções de usuário
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
                   <a class="dropdown-item" href="../view/gerenciador_comentarios.php">Comentários</a>
                <?php endif; ?>
                <?php if (empty($_SESSION['id_habilitado'])): ?>
                  <a class="dropdown-item" href="../view/cadastrohabilitado.php?pg=cadastrohabilitado">Quero ser <br> um habiltado</a>
                <?php endif; ?>
                <a class="dropdown-item" href="../view/atualizar_cadastro.php">Atualizar <br> cadastrar</a>
                <!-- <a class="dropdown-item" href="../view/safadao.php">Código do anjo</a> -->
                <?php if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])): ?>
                  <form class="" action="../view/admin.php" method="post">
                    <button type="submit" class="btn btn-light dropdown-item" name="todos">Admin</button>
                  </form>

                  <a class="dropdown-item" href="../view/denuncia.php">Denúncias</a>
                  <!-- <button type="button" class="btn btn-light" name="todos"><a class="dropdown-item" href="../view/admin.php">Admin</a></button> -->
                <?php endif; ?>
                <a class="dropdown-item" href="../controller/logout.php">Sair</a>
              </div>
            </div>

        <?php endif; ?>
        <?php if (isset($_SESSION['idUser']) == false): ?>
          <a type="button" class="btn btn-success" href="../view/login.php?pg=login">Entrar</a>
        <?php endif; ?>
    </div>
</nav>
