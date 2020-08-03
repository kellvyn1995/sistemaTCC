<?php
include_once "../model/modelUsuario.php";
switch (get_post_action('calcular', 'recalcular')) {
  case 'calcular':
    $dia = addslashes($_POST['dia']);
    $mes = addslashes($_POST['mes']);
    $ano = addslashes($_POST['ano']);
    $rest = substr(''.$ano, -2);
    $safadeza = ($mes)+($rest/100)*(50-$dia);
    $anjo = 100 - $safadeza;
    // echo "safadeza".$safadeza."%";
    // echo "anjo".$anjo."%";
    echo "<script>top.window.location='../view/safadao.php?anjo=$anjo&safadeza=$safadeza';</script>";
    break;

    case 'recalcular':
      echo "<script>top.window.location='../view/safadao.php';</script>";
      break;

  default:
    echo "Não entrou nas Opções";
    
    break;
}

 ?>
