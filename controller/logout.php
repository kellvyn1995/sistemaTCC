<?php
session_start();
// incerra a sessao do usuario
unset($_SESSION['idUser']);
unset($_SESSION['id_habilitado']);
unset($_SESSION['nome']);

// ele sera redirecionado para pagina inicial
header("Location: ../index.php")

 ?>
