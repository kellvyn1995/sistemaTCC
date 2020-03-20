<?php
session_start();
// incerra a sessao do usuario
unset($_SESSION['idUser']);
// ele sera redirecionado para pagina inicial
header("Location: ../index.php")

 ?>
