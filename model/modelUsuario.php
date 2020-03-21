<?php

class Logar{
		// parte do sistema de login
		public function login($email, $senha){
			$pdo = conectar();

			// sql fara uma consulta ao banco de dados, para busca o usuario
			$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
			$sql = $pdo->prepare($sql);
			$sql->bindValue("email",$email);
			$sql->bindValue("senha",md5($senha));
			$sql->execute();

			// verificar quantos registro tem com essa informação
			if ($sql->rowCount() > 0) {
				$dado = $sql->fetch();
				$_SESSION['idUser'] = $dado['id'];

				return true;
			}else {
				echo "nenhum usuario encontrado";
			}

		}
		// controle de acesso
		public function logged($id){
			$pdo = conectar();

			$array = array();

			$sql = "SELECT * FROM usuarios WHERE id = :id";
			$sql = $pdo->prepare($sql);
			$sql->bindValue("id",$id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$array = $sql->fetch();

			}

			return $array;
		}
}


function cadastrar($dados_usuario){
		$pdo = conectar();

	    try {
	        $query = $pdo->prepare("INSERT INTO usuarios (nome, sobreNome, email, telefone, senha, nascimento, cpf) VALUES (:nome, :sobreNome, :email, :telefone, :senha, :nascimento, :cpf)");

		        $query->bindValue(":nome", $dados_usuario->getNome());
		        $query->bindValue(":sobreNome", $dados_usuario->getSobreNome());
		        $query->bindValue(":email", $dados_usuario->getEmail());
				    $query->bindValue(":telefone", $dados_usuario->getTelefone());
				    $query->bindValue(":senha", $dados_usuario->getSenha());
				    $query->bindValue(":nascimento", $dados_usuario->getNascimento());
            $query->bindValue(":cpf", $dados_usuario->getCpf());

		        $query->execute();

            return true;

	    } catch (PDOException $e) {
	        echo "Erro ao cadastrar usuario: ".$e->getMessage();
          return false;
	    }
	}

	function verificarEmail($dados_usuario){
		$pdo = conectar();

		// sql fara uma consulta ao banco de dados, para busca o e-mail
		$sql = "SELECT * FROM usuarios WHERE email = :email";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":email", $dados_usuario->getEmail());
		$sql->execute();

		// verificar quantos registro tem com essa informação
		// se tiver um registro retorna true
		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			return true;
		}else {
			return false;
		}

	}



	function atualizar_usuario($dados_usuario){
			$pdo = conectar();
			$id = $_SESSION['idUser'];
		    try {
					$atualizar_usuario = $pdo->prepare('UPDATE usuarios SET nome = :nome,
								sobreNome = :sobreNome,
								email = :email,
								telefone = :telefone,
								nascimento = :nascimento,
								cpf = :cpf
								WHERE id = :id');

								$atualizar_usuario->bindValue(":nome", $dados_usuario->getNome());
				        $atualizar_usuario->bindValue(":sobreNome", $dados_usuario->getSobreNome());
				        $atualizar_usuario->bindValue(":email", $dados_usuario->getEmail());
						    $atualizar_usuario->bindValue(":telefone", $dados_usuario->getTelefone());
						    $atualizar_usuario->bindValue(":nascimento", $dados_usuario->getNascimento());
		            $atualizar_usuario->bindValue(":cpf", $dados_usuario->getCpf());
								$atualizar_usuario->bindValue(":id",$id);

				        $atualizar_usuario->execute();

	            return true;

		    } catch (PDOException $e) {
		        echo "Erro atualizar usuario: ".$e->getMessage();

	          return false;
		    }
		}


		function verifyCPF( $cpf )
    {
        $cpf = "$cpf";
        if (strpos($cpf, "-") !== false)
        {
          $cpf = str_replace("-", "", $cpf);
        }
        if (strpos($cpf, ".") !== false)
        {
            $cpf = str_replace(".", "", $cpf);
        }
        $sum = 0;
        $cpf = str_split( $cpf );
        $cpftrueverifier = array();
        $cpfnumbers = array_splice( $cpf , 0, 9 );
        $cpfdefault = array(10, 9, 8, 7, 6, 5, 4, 3, 2);
        for ( $i = 0; $i <= 8; $i++ )
        {
            $sum += $cpfnumbers[$i]*$cpfdefault[$i];
        }
        $sumresult = $sum % 11;
        if ( $sumresult < 2 )
        {
            $cpftrueverifier[0] = 0;
        }
        else
        {
            $cpftrueverifier[0] = 11-$sumresult;
        }
        $sum = 0;
        $cpfdefault = array(11, 10, 9, 8, 7, 6, 5, 4, 3, 2);
        $cpfnumbers[9] = $cpftrueverifier[0];
        for ( $i = 0; $i <= 9; $i++ )
        {
            $sum += $cpfnumbers[$i]*$cpfdefault[$i];
        }
        $sumresult = $sum % 11;
        if ( $sumresult < 2 )
        {
            $cpftrueverifier[1] = 0;
        }
        else
        {
            $cpftrueverifier[1] = 11 - $sumresult;
        }
        $returner = false;
        if ( $cpf == $cpftrueverifier )
        {
            $returner = true;
        }


        $cpfver = array_merge($cpfnumbers, $cpf);

        if ( count(array_unique($cpfver)) == 1 || $cpfver == array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0) )

        {

            $returner = false;

        }
        return $returner;
    }


		function cadastrar_habilitado($nome_apresentacao,$apresentacao,$horario_atendimento,$titulo_descricao,$texto_descricao,$id_usuario){

			$pdo = conectar();

		    try {
		        $query = $pdo->prepare("INSERT INTO habilitados (nome_apresentacao, apresentacao,  horario_atendimento, titulo_descricao, texto_descricao, id_usuario) VALUES (:nome_apresentacao, :apresentacao, :horario_atendimento, :titulo_descricao, :texto_descricao, :id_usuario)");

			        $query->bindValue(":nome_apresentacao", $nome_apresentacao);
			        $query->bindValue(":apresentacao", $apresentacao);
							$query->bindValue(":horario_atendimento",$horario_atendimento);
					    $query->bindValue(":titulo_descricao", $titulo_descricao);
							$query->bindValue(":texto_descricao", $texto_descricao);
							$query->bindValue(":id_usuario", $id_usuario);

			        $query->execute();

	            return true;

		    } catch (PDOException $e) {
		        echo "Erro ao cadastrar habilitado: ".$e->getMessage();
	          return false;
		    }
		}
		//fara a busca de todos os habilitado para pagina index
		function buscar_todos_habilitado(){
			


		}
		// realizara a busca de apenas um habilitado para mostra da pagina perfil
		function buscar_um_habilitado(){


		}
 ?>
