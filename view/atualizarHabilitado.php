<?php
// se o usuario estiver logado não tera acesso a essa pagina
include_once "../controller/c_verifica.php";
include_once "../controller/c_consulta.php";


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php include_once "../view/menu.php"; ?>
<!--conteiner-->
<div class="container p-3 my-3 bg-dark text-white">






  <!--formulario-->
  <div class="container">
    <form method="POST" action="../controller/c_update_habilitado.php">
      <h3 class="text-center text-white pt-3">EDITAR HABILITADO</h3>
      <!--linha 1-->
      <div class="row">
        <div class="form-group col-md-6">
          <label for="">Nome de Apresentação</label>
        <input type="text" name="nome_apresentacao" class="form-control"  maxlength="50" value="<?php echo $dados_habilitado['nome_apresentacao']?>" >
        <label for="" class="my-2">Horario de atendimento</label>
        <input type="text" data-mask="00:00 as 00:00" name="horario_atendimento" class="form-control"  maxlength="50" value="<?php echo $dados_habilitado['horario_atendimento']?>">

        <label for="" class="my-2">Titulo do texto de descrição</label>
          <input type="text" name="titulo_descricao" class="form-control"  maxlength="50" value="<?php echo $dados_habilitado['titulo_descricao']?>">
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlTextarea1">Apresentação</label>
          <textarea class="form-control" name="apresentacao" id="exampleFormControlTextarea1"  rows="3" ><?php echo $dados_habilitado['apresentacao']?></textarea>
          <label for="" class="my-2">Texto de descrição</label>
          <textarea class="form-control" name="texto_descricao"  id="exampleFormControlTextarea1" rows="3" ><?php echo $dados_habilitado['texto_descricao']?></textarea>
        </div>

          <div class="form-group w-100"></div>
          <button type="submit" value="cadastrar" class="btn btn-success">Salva</button>
      </div>

    </form>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!--para utilizar as mascaras no input-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
