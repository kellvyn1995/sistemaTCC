<?php
include_once "../libs/class/classUsuario.php";
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
// verificar ser o usuario esta conectado ao sistema
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
  $id_usuario = $_SESSION['idUser'];

  $buscar_mensagens = buscar_mensagens();

}else {
  header("Location: ../view/login.php");
}


switch (get_post_action('envia_men', '',)) {
   case 'envia_men':
           $mensagem_enviada = addslashes($_POST['mensagem_enviada']);
           if(isset($mensagem_enviada) && !empty($mensagem_enviada)){
             $id_remetente = addslashes($_POST['remetente']);
             $id_destino = addslashes($_POST['destino']);
             $chat = envia_mensagem($id_remetente,$id_destino,$mensagem_enviada);
             if ($chat) {
               header("Location: ../view/mensagem.php");
             }else {
               echo "nada sei";
             }
           }
       break;

         case 'umaConversa':
         $id_remetente = addslashes($_POST['remetente']);
         $id_destino = addslashes($_POST['destino']);
              $uma_conversa = buscar_uma_conversa($id_remetente,$id_destino);
         break;

           case 'delete_link':

                 break;

   default:
       //no action sent
}

 ?>
