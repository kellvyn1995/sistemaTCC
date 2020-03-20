<?php
  require_once '../model/conexao.php';
  $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>cadastrto de usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<!--conteiner-->
<div class="container p-3 my-3 bg-dark text-white">
  <!--formulario-->
  <div class="container">
    <form method="POST">
      <h3 class="text-center text-white pt-3">REALIZE SEU CADASTRO</h3>
      <!--linha 1-->
      <div class="row">
        <div class="form-group col-md-6">
        <input type="text" name="nome" class="form-control" placeholder="Nome" maxlength="50">
        </div>
        <div class="form-group col-md-6">
        <input type="text" name="sobreNome" class="form-control" placeholder="Sobrenome" maxlength="50">
        </div>

        <!--linha 2-->
      <div class="w-100"></div>
        <div class="form-group col-md-6">
        <input type="text" name="email" class="form-control" placeholder="E-mail" maxlength="100">
        </div>
        <div class="form-group col-md-6">
        <input type="text" name="telefone" class="form-control" placeholder="Telefone" maxlength="16">
        </div>
        <!--linha 3-->
        <div class=" w-100"></div>
          <div class="form-group col-md-6">
          <input type="text" name="senha" class="form-control" placeholder="Senha" maxlength="16">
          </div>
          <div class="form-group col-md-6">
          <input type="text" name="confirmarSenha" class="form-control" placeholder="Confirmar senha" maxlength="16">
          </div>
          <!--linha 4-->
        <div class="w-100"></div>
          <div class="form-group col-md-6">
          <input type="text" name="nascimento" class="form-control" placeholder="Data de nacimento" maxlength="8">
          </div>
          <div class="form-group col-md-6">
          <input type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="12">
          </div>
          <div class="form-group w-100"></div>
          <button type="submit" value="cadastrar" class="btn btn-success">Cadastrar</button>
      </div>

    </form>
  </div>
</div>

<?php
// verificar se clicou no botão
if(isset($_POST['nome'])){
  $nome = addslashes($_POST['nome']);
  $sobreNome = addslashes($_POST['sobreNome']);
  $email = addslashes($_POST['email']);
  $telefone = addslashes($_POST['telefone']);
  $senha = addslashes($_POST['senha']);
  $confirmarSenha = addslashes($_POST['confirmarSenha']);
  $nascimento = addslashes($_POST['nascimento']);
  $cpf = addslashes($_POST['cpf']);
  //verificar se esta preenchido
  if (!empty($nome) && !empty($sobreNome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($nascimento) && !empty($cpf)) {
      $u->conectar("inventiva","192.168.1.8","root","");
      if ($u->msgErro = "") //se esta tudo OK
      {
          if ($senha == $confirmarSenha) {
            if ($u->cadastrar($nome, $sobreNome, $email, $telefone, $senha, $nascimento, $cpf)) {
              echo "cadastrado com sucesso! acesse para entrar";
            }else {
              echo "Email ja cadastrado!";
            }
          }else {
            echo "senha e confirmarSenha não correspondem!";
          }
      }else {
        echo "ERRO: ".$u->msgErro;
      }
  }else {
    echo "Preencha todos os campos!";
  }

}
 ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



<?php




/* class Usuario{
  private $pdo;
  public $msgErro = "ta vazia";
  public function conectar($nomeBanco, $host, $usuario, $senha){
    global $pdo;
    global $msgErro;
    try {
      $pdo = new PDO("mysql:dbname=".$nomeBanco.";host=".$host,$usuario,$senha);
    } catch (PDOException $e) {
      $msgErro = $e->getMessage();
    }


  }

  public function cadastrar($nome, $sobreNome, $email, $telefone, $senha, $nascimento, $cpf){
    global $pdo;
    //verificar se já existe o email cadastrado
     $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email =:e");
     $sql->bindValue(":e",$email);
     $sql->execute();
     if ($sql->rowCount() > 0) {
       return false; //ja esta cadastrado
     }else {
       //caso não, cadastrar
       $sql = $pdo->prepare("INSERT INTO usuarios (nome, sobreNome, email, telefone, senha, nascimento, cpf) VALUES (:nome, :sobreNome, :email, :telefone, :senha, :nascimento, :cpf) ");
       $sql->bindValue(":nome",$nome);
       $sql->bindValue(":sobreNome",$sobreNome);
       $sql->bindValue(":email",$email);
       $sql->bindValue(":telefone",$telefone);
       $sql->bindValue(":senha",md5($senha));
       $sql->bindValue(":nascimento",$nascimento);
       $sql->bindValue(":cpf",$cpf);
       $sql->execute();
       return true;
     }


  }

  public function logar($email, $senha){
  global $pdo;
  //verificar se o email e senha estão cadastrados, se sim
  $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
  $sql->bindValue(":email",$email);
  $sql->bindValue(":senha",md5($senha));
  $sql->execte();
  if ($sql->rowCount() > 0) {
    //entrar no sistema (sessão)
    $dado_id = $sql->fetch();
    session_start();
    $_SESSION['id'] = $dado_id['id'];
    return true; //logado com sucesso
  }else {
    return false; //não foi possivel logar
  }
}

} */


/*define('HOST', '192.168.1.8');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'inventiva');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ("não foi possivel connectar"); */


 ?>
