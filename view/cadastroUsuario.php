<?php
// se o usuario estiver logado não tera acesso a essa pagina
include_once "../model/conexao.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>cadastrto de usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!--conteiner-->
<div class="container p-3 my-3 bg-dark text-white">


  <?php $pg = addslashes($_GET['pg']); if (isset($_GET['pg']) && !empty($_GET['pg'])): ?>
    <div class="alert alert-danger" role="alert">
      <?php
      // verificação de ERRo
      switch ($pg) {
        case '1':
          echo "Preencha todos os campos coretamente! ";
          $pg = 0;
        break;
        case '2':
            echo "Senha diferente de confirmar senha!";
            $pg = 0;
        break;
        case '3':
            echo "CPF invalido!";
            $pg = 0;
        break;
        case '4':
            echo "E-mail já esta cadastrado!";
            $pg = 0;
        break;
      }
       ?>
    </div>
  <?php endif; ?>



  <!--formulario-->
  <div class="container">
    <form method="POST" action="../controller/c_cadastro.php">
      <h3 class="text-center text-white pt-3">REALIZE SEU CADASTRO</h3>
      <!--linha 1-->
      <div class="row">
        <div class="form-group col-md-6">
          <label for="">Nome</label>
          <?php if (isset($_SESSION['tnome']) && !empty($_SESSION['tnome'])): ?>
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $_SESSION['tnome']?>" maxlength="50">
          <?php endif; ?>
          <?php if (empty($_SESSION['tnome'])): ?>
            <input type="text" name="nome" class="form-control" placeholder="Nome" maxlength="50">
          <?php endif; ?>

        </div>
        <div class="form-group col-md-6">
          <label for="">Sobrenome</label>
          <?php if (isset($_SESSION['tsobrenome']) && !empty($_SESSION['tsobrenome'])): ?>
            <input type="text" name="sobreNome" class="form-control" placeholder="Sobrenome" value="<?php echo $_SESSION['tsobrenome']?>" maxlength="50">
          <?php endif; ?>
          <?php if (empty($_SESSION['tsobrenome'])): ?>
            <input type="text" name="sobreNome" class="form-control" placeholder="Sobrenome" maxlength="50">
          <?php endif; ?>

        </div>

        <!--linha 2-->
      <div class="w-100"></div>
        <div class="form-group col-md-6">
          <label for="">E-mail</label>
          <?php if (isset($_SESSION['temail']) && !empty($_SESSION['temail'])): ?>
            <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $_SESSION['temail']?>" maxlength="100">
          <?php endif; ?>
          <?php if (empty($_SESSION['temail'])): ?>
            <input type="email" name="email" class="form-control" placeholder="E-mail" maxlength="100">
          <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
          <label for="">Telefone</label>
          <?php if (isset($_SESSION['ttelefone']) && !empty($_SESSION['ttelefone'])): ?>
            <input type="text" data-mask="(00) 00000-0000" name="telefone" class="form-control" value="<?php echo $_SESSION['ttelefone']?>"placeholder="Telefone" maxlength="16">
          <?php endif; ?>
          <?php if (empty($_SESSION['ttelefone'])): ?>
            <input type="text" data-mask="(00) 00000-0000" name="telefone" class="form-control" placeholder="Telefone" maxlength="16">
          <?php endif; ?>
        </div>
        <!--linha 3-->
        <div class=" w-100"></div>
          <div class="form-group col-md-6">
            <label for="">Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Senha" minlength="8" maxlength="16">
          </div>
          <div class="form-group col-md-6">
            <label for="">Confirmar senha</label>
          <input type="password" name="confirmarSenha" class="form-control" placeholder="Confirmar senha" minlength="8" maxlength="16">
          </div>
          <!--linha 4-->
        <div class="w-100"></div>
          <div class="form-group col-md-6">
            <label for="">Data de nacimento</label>
            <?php if (isset($_SESSION['tnascimento']) && !empty($_SESSION['tnascimento'])): ?>
              <input type="text"  data-mask="00/00/0000" name="nascimento" class="form-control" value="<?php echo $_SESSION['tnascimento']?>" placeholder="Nascimento" maxlength="10">
            <?php endif; ?>
            <?php if (empty($_SESSION['tnascimento'])): ?>
              <input type="text"  data-mask="00/00/0000" name="nascimento" class="form-control" placeholder="Nascimento" maxlength="10">
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6">
            <label for="">CPF</label>
            <?php if (isset($_SESSION['tcpf']) && !empty($_SESSION['tcpf'])): ?>
              <input type="text" data-mask="000.000.000-00" name="cpf" class="form-control" value="<?php echo $_SESSION['tcpf']?>" placeholder="CPF" maxlength="12">
            <?php endif; ?>
            <?php if (empty($_SESSION['tcpf'])): ?>
              <input type="text" data-mask="000.000.000-00" name="cpf" class="form-control"  placeholder="CPF" maxlength="12">
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6">
            <label for="">Política de Privacidade</label>
            <a href="#" class="stretched-link" data-toggle="modal" data-target="#siteModal">ler termo de consentimento.</a>
          </div>
          <div class="form-group col-md-6">
            <label for="">Sobre a Política de Privacidade da plataforma</label> <br>
            <input type="checkbox" name="aceito" value="on">Li e estou de Acordo.<br><br>
            <div class="float-right">
              <input type="submit" name="btnCadUsuario" value="Cadastrar" disabled class="btn btn-success"><br><br>
            </div>
          </div>
            <!--<div class="form-group w-100"></div>-->
      </div>
          <!--Habilitar botão ao marcar o checkbox-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[name=aceito]').change(function(){
                if ($(this).is(':checked')) {
                    $('input[name=btnCadUsuario]').removeAttr('disabled');
                } else {
                    $('input[name=btnCadUsuario]').attr('disabled',true);
                }
            });
        });
    </script>
    <!--Habilitar botão ao marcar o checkbox fim-->
    </form>
  </div>
</div>

<!-- modal -->

<div class="modal fade" id="siteModal" tabindex="1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5>Termo de consentimento</h5>
            <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <!--corpo do texto -->

              <p>A presente Política de Privacidade contém informações sobre coleta, uso, armazenamento, tratamento e proteção dos dados pessoais dos usuários e visitantes do site Inventiva.top, com a finalidade de demonstrar absoluta transparência quanto ao assunto e esclarecer a todos interessados sobre os tipos de dados que são coletados, os motivos da coleta e a forma como os usuários podem gerenciar ou excluir as suas informações pessoais. </p>

              <p>O Sr. (a) está sendo convidado (a) como voluntário (a) a participar da pesquisa “inventiva: sistema web para catálogo digital de profissionais do setor da economia criativa”. Neste estudo pretendemos desenvolver e avaliar um site para localizar e divulgar os profissionais do setor da economia criativa. Para participar deste estudo você não terá nenhum custo, nem receberá qualquer vantagem financeira. Você será esclarecido(a) sobre o estudo em qualquer aspecto que desejar e estará livre para participar ou recusar-se a participar. Poderá retirar seu consentimento ou interromper a participação a qualquer momento. A sua participação é voluntária e a recusa em participar não acarretará qualquer penalidade ou modificação na forma em que é atendido pelo pesquisador. Todas as informações coletadas serão de uso acadêmico o pesquisador irá tratar a sua identidade com padrões profissionais de sigilo. </p>

              <p>Ao se cadastrar na plataforma você entende e concorda com os seguintes termos:

                1. Todos as informações fornecidas nesta plataforma serão compartilhadas na internet, e poderão ser acessadas de qualquer lugar do mundo por qualquer pessoa, a plataforma não se responsabiliza pela forma como os usuários irão utilizar seus dados.
                2. Como benefício ao se cadastrar na plataforma inventiva terá como privilégios, poder realizar comentário nos perfis dos profissionais que estão na plataforma e da uma nota de avaliação referente a qualidade do trabalho realizado pelo profissional habilitada da economia criativa.
                </p>

            </div>

          </div>

          <div class="modal-footer">

          </div>

    </div>

  </div>

</div>
<?php
unset($_SESSION['tnome']);
unset($_SESSION['tsobrenome']);
unset($_SESSION['temail']);
unset($_SESSION['tcpf']);
unset($_SESSION['tnascimento']);

 ?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!--para utilizar as mascaras no input-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
