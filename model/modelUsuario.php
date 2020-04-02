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
				$_SESSION['nome'] = $dado['nome'];
				return true;
			}else {
				echo "nenhum usuario encontrado";
			}

		}
		// controle de acesso busca informações
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

		// realizara a busca de apenas um habilitado
		public function buscar_um_habilitado($id){
			$pdo = conectar();

			// sql fara uma consulta ao banco de dados, para busca o habilitado
			$sql = "SELECT * FROM habilitados WHERE id_usuario = :id_usuario";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":id_usuario",$id);
			$sql->execute();

			// verificar quantos registro tem com essa informação
			// se encontrado uma registro sera criado uma sessão
			if ($sql->rowCount() > 0) {
				$dado = $sql->fetch();
				$_SESSION['id_habilitado'] = $dado['id_habilitado'];
				return true;
			}else {
				return false;
				}
			}

			// controle de acesso busca informações
			public function buscar_dados_habilitado($id){
				$pdo = conectar();

				$array = array();

				$sql = "SELECT * FROM habilitados WHERE id_habilitado = :id";
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
			$status = 0;
		    try {
		        $query = $pdo->prepare("INSERT INTO habilitados (nome_apresentacao, apresentacao,  horario_atendimento, titulo_descricao, texto_descricao,status, id_usuario) VALUES (:nome_apresentacao, :apresentacao, :horario_atendimento, :titulo_descricao, :texto_descricao, :status, :id_usuario)");

			        $query->bindValue(":nome_apresentacao", $nome_apresentacao);
			        $query->bindValue(":apresentacao", $apresentacao);
							$query->bindValue(":horario_atendimento",$horario_atendimento);
					    $query->bindValue(":titulo_descricao", $titulo_descricao);
							$query->bindValue(":texto_descricao", $texto_descricao);
							$query->bindValue(":status", $status);
							$query->bindValue(":id_usuario", $id_usuario);

			        $query->execute();

	            return true;

		    } catch (PDOException $e) {
		        echo "Erro ao cadastrar habilitado: ".$e->getMessage();
	          return false;
		    }
		}
		//fara alteração do status
		function atualizar_status($id_habilitado,$atual_status){
			$pdo = conectar();
		    if ($atual_status == 0) {
					$atual_status = 1;
					try {
						$atualizar_status = $pdo->prepare('UPDATE habilitados SET status = :status WHERE id_habilitado = :id_habilitado');
									$atualizar_status->bindValue(":status", 1);
					        $atualizar_status->bindValue(":id_habilitado",$id_habilitado);
									$atualizar_status->execute();
		            return true;

			    } catch (PDOException $e) {
			        echo "Erro atualizar status habilitado: ".$e->getMessage();
		          return false;
			    }
		    }else {
					$atual_status = 0;
					try {
						$atualizar_status = $pdo->prepare('UPDATE habilitados SET status = :status WHERE id_habilitado = :id_habilitado');
									$atualizar_status->bindValue(":status",0);
					        $atualizar_status->bindValue(":id_habilitado",$id_habilitado);
									$atualizar_status->execute();
		            return true;

			    } catch (PDOException $e) {
			        echo "Erro atualizar status habilitado: ".$e->getMessage();
		          return false;
			    }
		    }
			}

			function atualizar_habilitado($nome_apresentacao,$apresentacao,$horario_atendimento,$titulo_descricao,$texto_descricao){
					$pdo = conectar();
					$id = $_SESSION['id_habilitado'];
				    try {
							$atualizar_habilitado = $pdo->prepare('UPDATE habilitados SET
										nome_apresentacao = :nome_apresentacao,
										apresentacao = :apresentacao,
										horario_atendimento = :horario_atendimento,
										titulo_descricao = :titulo_descricao,
										texto_descricao = :texto_descricao
										WHERE id_habilitado = :id');

										$atualizar_habilitado->bindValue(":nome_apresentacao", $nome_apresentacao);
						        $atualizar_habilitado->bindValue(":apresentacao", $apresentacao);
										$atualizar_habilitado->bindValue(":horario_atendimento",$horario_atendimento);
								    $atualizar_habilitado->bindValue(":titulo_descricao", $titulo_descricao);
										$atualizar_habilitado->bindValue(":texto_descricao", $texto_descricao);
										$atualizar_habilitado->bindValue(":id",$id);

						        $atualizar_habilitado->execute();

			            return true;

				    } catch (PDOException $e) {
				        echo "Erro atualizar habilitado: ".$e->getMessage();

			          return false;
				    }
				}

				function add_agenda($data_agenda,$local_agenda,$evento_agenda,$informacao_agenda,$id_h){

					$pdo = conectar();

				    try {
				        $query = $pdo->prepare("INSERT INTO agenda (data, local, evento, informacao, id_habil) VALUES (:data_agenda, :local_agenda, :evento_agenda, :informacao_agenda, :id_habil)");
					        $query->bindValue(":data_agenda", $data_agenda);
					        $query->bindValue(":local_agenda", $local_agenda);
									$query->bindValue(":evento_agenda",$evento_agenda);
							    $query->bindValue(":informacao_agenda", $informacao_agenda);
									$query->bindValue(":id_habil", $id_h);

					        $query->execute();

			            return true;

				    } catch (PDOException $e) {
				        echo "Erro ao adicionar na agenda: ".$e->getMessage();
			          return false;
				    }
				}

				// controle de acesso busca informações
				// utiliza o id do habilitado pra fazer a busca na tela agenda
				function buscar_dados_agenda($id_h){
					$pdo = conectar();
					$sql = "SELECT * FROM agenda WHERE id_habil = :id_habil ORDER BY id_agenda DESC";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_habil",$id_h);
					$sql->execute();
					return $sql;
				}
				// controle de acesso busca informações
				// utiliza o id do habilitado pra fazer a busca na tela agenda
				function buscar_um_dado_da_agenda($id_agenda){
					$pdo = conectar();
					$array = array();

					$sql = "SELECT * FROM agenda WHERE id_agenda = :id_agenda";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_agenda",$id_agenda);
					$sql->execute();

					if ($sql->rowCount() > 0) {
						$array = $sql->fetch();
					}
					return $array;
				}

				// a função era pega a acção que dever ser executada como add, upate ou delete
				function get_post_action($name)
				{
				    $params = func_get_args();

				    foreach ($params as $name) {
				        if (isset($_POST[$name])) {
				            return $name;
				        }
				    }
				}
				function delete_agenda($id_agenda){
					$pdo = conectar();
				    try {
							$sql = $pdo->prepare('DELETE FROM agenda WHERE id_agenda = :id_agenda');
							$sql->bindValue(':id_agenda', $id_agenda);
							$sql->execute();

			         return true;

				    } catch (PDOException $e) {
				        echo "Erro ao deleta da agenda: ".$e->getMessage();
			          return false;
				    }

				}

				function update_agenda($data_agenda,$local_agenda,$evento_agenda,$informacao_agenda,$id_h){
					$pdo = conectar();

				    try {
				        $query = $pdo->prepare('UPDATE agenda SET
									data   = :data_agenda,
					        local  = :local_agenda,
									evento = :evento_agenda,
							    informacao = :informacao_agenda
									WHERE id_habil = :id_habil');

					        $query->bindValue(":data_agenda", $data_agenda);
					        $query->bindValue(":local_agenda", $local_agenda);
									$query->bindValue(":evento_agenda",$evento_agenda);
							    $query->bindValue(":informacao_agenda", $informacao_agenda);
									$query->bindValue(":id_habil", $id_h);

					        $query->execute();

			            return true;

				    } catch (PDOException $e) {
				        echo "Erro ao atualiza na agenda: ".$e->getMessage();
			          return false;
				    }
				}
				// funções para usar na imagens
				// para cadastrar as imgens na tabela imagens
				function add_fotos($img_perfil,$img_slide1,$img_slide2,$img_slide3,$img_descricao){

					$pdo = conectar();
					$id_habil = $_SESSION['id_habilitado'];

				    try {
				        $query = $pdo->prepare("INSERT INTO imagens (img_perfil, img_slide1, img_slide2, img_slide3, img_descricao, id_habil) VALUES (:img_perfil,:img_slide1,:img_slide2,:img_slide3,:img_descricao,:id_habil)");
					        $query->bindValue(":img_perfil", $img_perfil);
					        $query->bindValue(":img_slide1", $img_slide1);
									$query->bindValue(":img_slide2", $img_slide2);
							    $query->bindValue(":img_slide3", $img_slide3);
									$query->bindValue(":img_descricao", $img_descricao);
									$query->bindValue(":id_habil", $id_habil);
					        $query->execute();

			            return true;

				    } catch (PDOException $e) {
				        echo "Erro ao adicionar na fotos: ".$e->getMessage();
			          return false;
				    }
				}

				// controle de acesso busca informações
				// utiliza o id do habilitado pra fazer a busca na tabela imagens
				function buscar_imagens($id_h){
					$pdo = conectar();
					$array = array();

					$sql = "SELECT * FROM imagens WHERE id_habil = :id_habil";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_habil",$id_h);
					$sql->execute();

					if ($sql->rowCount() > 0) {
						$array = $sql->fetch();
						return $array;
					}else {
						return false;
					}


				}


				function img_delete($id_imagem,$id_h){
					$dados_imagens = buscar_imagens($id_h);
					$pdo = conectar();
				    try {
							$sql = $pdo->prepare('SELECT * FROM imagens WHERE id_imagem = :id_imagem');
							$sql->bindValue(':id_imagem', $id_imagem);
							$sql->execute();
							if ($sql) {
								// o unlink e para apaga os arquivos que estão na pasta do servidor
								unlink($dados_imagens['img_perfil']);
								unlink($dados_imagens['img_slide1']);
								unlink($dados_imagens['img_slide2']);
								unlink($dados_imagens['img_slide3']);
								unlink($dados_imagens['img_descricao']);


								$sql = $pdo->prepare('DELETE FROM imagens WHERE id_imagem = :id_imagem');
								$sql->bindValue(':id_imagem', $id_imagem);
								$sql->execute();

								 return true;
							}

				    } catch (PDOException $e) {
				        echo "Erro ao deleta da agenda: ".$e->getMessage();
			          return false;
				    }


				}
 ?>
