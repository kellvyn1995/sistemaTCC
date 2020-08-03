<?php
session_start();
// incerra a sessao do usuario
unset($_SESSION['idUser']);
unset($_SESSION['id_habilitado']);
unset($_SESSION['nome']);
unset($_SESSION['id_agenda']);
unset($_SESSION['id_m']);
unset($_SESSION['id_h']);
unset($_SESSION['id_admin']);
// ele sera redirecionado para pagina inicial
echo "<script>top.window.location='../index.php';</script>";
 ?>
