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

			// realizara a busca de admin
			public function buscar_um_admin($id){
				$pdo = conectar();

				// sql fara uma consulta ao banco de dados, para busca o admin
				$sql = "SELECT * FROM admin WHERE id_u_admin = :id_usuario";
				$sql = $pdo->prepare($sql);
				$sql->bindValue(":id_usuario",$id);
				$sql->execute();

				// verificar quantos registro tem com essa informação
				// se encontrado uma registro sera criado uma sessão
				if ($sql->rowCount() > 0) {
					$dado = $sql->fetch();
					$_SESSION['id_admin'] = $dado['id_admin'];
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


		function cadastrar_habilitado($nome_apresentacao,$apresentacao,$horario_atendimento,$titulo_descricao,$texto_descricao,$id_usuario,$hashtags){

			$pdo = conectar();
			$status = 0;
		    try {
		        $query = $pdo->prepare("INSERT INTO habilitados (nome_apresentacao, apresentacao,  horario_atendimento, titulo_descricao, texto_descricao,hashtags, status, id_usuario) VALUES (:nome_apresentacao, :apresentacao, :horario_atendimento, :titulo_descricao, :texto_descricao, :hashtags, :status, :id_usuario)");

			        $query->bindValue(":nome_apresentacao", $nome_apresentacao);
			        $query->bindValue(":apresentacao", $apresentacao);
							$query->bindValue(":horario_atendimento",$horario_atendimento);
					    $query->bindValue(":titulo_descricao", $titulo_descricao);
							$query->bindValue(":texto_descricao", $texto_descricao);
							$query->bindValue(":hashtags", $hashtags);
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

			function atualizar_habilitado($nome_apresentacao,$apresentacao,$horario_atendimento,$titulo_descricao,$texto_descricao,$hashtags){
					$pdo = conectar();
					$id = $_SESSION['id_habilitado'];
				    try {
							$atualizar_habilitado = $pdo->prepare('UPDATE habilitados SET
										nome_apresentacao = :nome_apresentacao,
										apresentacao = :apresentacao,
										horario_atendimento = :horario_atendimento,
										titulo_descricao = :titulo_descricao,
										texto_descricao = :texto_descricao,
										hashtags = :hashtags
										WHERE id_habilitado = :id');

										$atualizar_habilitado->bindValue(":nome_apresentacao", $nome_apresentacao);
						        $atualizar_habilitado->bindValue(":apresentacao", $apresentacao);
										$atualizar_habilitado->bindValue(":horario_atendimento",$horario_atendimento);
								    $atualizar_habilitado->bindValue(":titulo_descricao", $titulo_descricao);
										$atualizar_habilitado->bindValue(":texto_descricao", $texto_descricao);
										$atualizar_habilitado->bindValue(":hashtags", $hashtags);
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

				// a função ira pega a ação que dever ser executada como add, upate ou delete
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
				function verificar_imagem($id_habil){
				  $pdo = conectar();
					$id_habil = $_SESSION['id_habilitado'];
				  $vertabela = $pdo->prepare("SELECT * FROM imagens WHERE $id_habil");
				  if ($vertabela == false) {

				  }else {
				    $criartabela = $pdo->prepare("INSERT INTO imagens (img_perfil, img_slide1, img_slide2, img_slide3, img_descricao, id_habil) VALUES ('','','','','',:id_habil)");
				    $criartabela->bindValue(":id_habil", $id_habil);
				    $criartabela->execute();
						return true;
				  }

				}

				function add_foto_perfil($img_perfil){
					$pdo = conectar();
				  $id_habil = $_SESSION['id_habilitado'];
					// o unlink e para apaga os arquivos que estão na pasta do servidor
					$dados_imagens = buscar_imagens($id_habil);
					unlink($dados_imagens['img_perfil']);
				  try {
				    $query = $pdo->prepare("UPDATE imagens SET img_perfil = :img_perfil WHERE id_habil = :id_habil");
				    $query->bindValue(":img_perfil", $img_perfil);
				    $query->bindValue(":id_habil", $id_habil);
				    $query->execute();
				    return true;
				  } catch (\Exception $e) {
				    echo "Erro ao adicionar foto perfil: ".$e->getMessage();
				    return false;
				  }


				}
				function add_foto_slide1($img_slide1){
				  $pdo = conectar();
				  $id_habil = $_SESSION['id_habilitado'];
					// o unlink e para apaga os arquivos que estão na pasta do servidor
					$dados_imagens = buscar_imagens($id_habil);
					unlink($dados_imagens['img_slide1']);
				  try {
				    $query = $pdo->prepare("UPDATE imagens SET img_slide1 = :img_slide1 WHERE id_habil = :id_habil");
				    $query->bindValue(":img_slide1", $img_slide1);
				    $query->bindValue(":id_habil", $id_habil);
				    $query->execute();
				    return true;
				  } catch (\Exception $e) {
				    echo "Erro ao adicionar foto slide 1: ".$e->getMessage();
				    return false;
				  }


				}
				function add_foto_slide2($img_slide2){
				  $pdo = conectar();
				  $id_habil = $_SESSION['id_habilitado'];
					// o unlink e para apaga os arquivos que estão na pasta do servidor
					$dados_imagens = buscar_imagens($id_habil);
					unlink($dados_imagens['img_slide2']);
				  try {
				    $query = $pdo->prepare("UPDATE imagens SET img_slide2 = :img_slide2 WHERE id_habil = :id_habil");
				    $query->bindValue(":img_slide2", $img_slide2);
				    $query->bindValue(":id_habil", $id_habil);
				    $query->execute();
				    return true;
				  } catch (\Exception $e) {
				    echo "Erro ao adicionar foto slide 2: ".$e->getMessage();
				    return false;
				  }


				}
				function add_foto_slide3($img_slide3){
				  $pdo = conectar();
				  $id_habil = $_SESSION['id_habilitado'];
					// o unlink e para apaga os arquivos que estão na pasta do servidor
					$dados_imagens = buscar_imagens($id_habil);
					unlink($dados_imagens['img_slide3']);
				  try {
				    $query = $pdo->prepare("UPDATE imagens SET img_slide3 = :img_slide3 WHERE id_habil = :id_habil");
				    $query->bindValue(":img_slide3", $img_slide3);
				    $query->bindValue(":id_habil", $id_habil);
				    $query->execute();
				    return true;
				  } catch (\Exception $e) {
				    echo "Erro ao adicionar foto slide3: ".$e->getMessage();
				    return false;
				  }


				}
				function add_foto_descricao($img_descricao){
				  $pdo = conectar();
				  $id_habil = $_SESSION['id_habilitado'];
					// o unlink e para apaga os arquivos que estão na pasta do servidor
					$dados_imagens = buscar_imagens($id_habil);
					unlink($dados_imagens['img_descricao']);
				  try {
				    $query = $pdo->prepare("UPDATE imagens SET img_descricao = :img_descricao WHERE id_habil = :id_habil");
				    $query->bindValue(":img_descricao", $img_descricao);
				    $query->bindValue(":id_habil", $id_habil);
				    $query->execute();
				    return true;
				  } catch (\Exception $e) {
				    echo "Erro ao adicionar foto descrição: ".$e->getMessage();
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

					// função para deleta todos as fotos do servido e tebela imagens
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

				// parte dos links dos videos
				function add_links($link1,$link2,$link3){

					$pdo = conectar();
					$id_h = $_SESSION['id_habilitado'];
				    try {
				        $query = $pdo->prepare("INSERT INTO links (link1, link2, link3, id_h_link) VALUES (:link1, :link2, :link3, :id_h_link)");
					        $query->bindValue(":link1", $link1);
					        $query->bindValue(":link2", $link2);
									$query->bindValue(":link3",$link3);
									$query->bindValue(":id_h_link", $id_h);

					        $query->execute();

			            return true;

				    } catch (PDOException $e) {
				        echo "Erro ao adicionar na tabela links: ".$e->getMessage();
			          return false;
				    }
				}
				// controle de acesso busca informações
				// utiliza o id do habilitado pra fazer a busca na tabela links
				function buscar_links($id_h){
					$pdo = conectar();
					$array = array();
					$sql = "SELECT * FROM links WHERE id_h_link = :id_h_link";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_h_link",$id_h);
					$sql->execute();
					if ($sql->rowCount() > 0) {
						$array = $sql->fetch();
						return $array;
					}else {
						return false;
					}


				}
				function delete_links($id_links){
					$pdo = conectar();
						try {

								$sql = $pdo->prepare('DELETE FROM links WHERE id_links = :id_links');
								$sql->bindValue(':id_links', $id_links);
								$sql->execute();

								 return true;


						} catch (PDOException $e) {
								echo "Erro ao deleta tabela links: ".$e->getMessage();
								return false;
						}

				}
				// redes sociais

				function add_sociais($youtube,$twitter,$linkedin,$instagram,$facebook,$github){

					$pdo = conectar();
					$id_hab = $_SESSION['id_habilitado'];
				    try {
				        $query = $pdo->prepare("INSERT INTO rede_sociais (youtube, twitter, linkedin, instagram, facebook, github, id_hab) VALUES (:youtube, :twitter, :linkedin, :instagram, :facebook, :github, :id_hab)");
					        $query->bindValue(":youtube",$youtube);
					        $query->bindValue(":twitter",$twitter);
									$query->bindValue(":linkedin",$linkedin);
									$query->bindValue(":instagram",$instagram);
					        $query->bindValue(":facebook",$facebook);
									$query->bindValue(":github",$github);
									$query->bindValue(":id_hab", $id_hab);

					        $query->execute();

			            return true;

				    } catch (PDOException $e) {
				        echo "Erro ao adicionar na tabela redes sociais: ".$e->getMessage();
			          return false;
				    }
				}
				// atualizar redes sociais
				function atualiza_sociais($youtube,$twitter,$linkedin,$instagram,$facebook,$github,$idrede){

					$pdo = conectar();

				    try {
				        $query = $pdo->prepare("UPDATE rede_sociais SET youtube = :youtube, twitter = :twitter, linkedin = :linkedin, instagram = :instagram, facebook = :facebook, github = :github WHERE id_rede = :id_rede");
					        $query->bindValue(":youtube",$youtube);
					        $query->bindValue(":twitter",$twitter);
									$query->bindValue(":linkedin",$linkedin);
									$query->bindValue(":instagram",$instagram);
					        $query->bindValue(":facebook",$facebook);
									$query->bindValue(":github",$github);
									$query->bindValue(":id_rede", $idrede);

					        $query->execute();

			            return true;

				    } catch (PDOException $e) {
				        echo "Erro ao Atualiza a tabela redes sociais: ".$e->getMessage();
			          return false;
				    }
				}
				// controle de acesso busca informações
				// utiliza o id do habilitado pra fazer a busca na tabela rede_sociais
				function buscar_redes($id_h){
					$pdo = conectar();
					$array = array();
					$sql = "SELECT * FROM rede_sociais WHERE id_hab = :id_hab";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_hab",$id_h);
					$sql->execute();
					if ($sql->rowCount() > 0) {
						$array = $sql->fetch();
						return $array;
					}else {
						return false;
					}
				}

				// sistema de buscar
				// controle de acesso busca informações
				// utiliza pega a informação digitada e realizar a busca na tabela
				function buscar($buscar){
					$pdo = conectar();
					if (!empty($buscar)) {
						$sql = "SELECT * FROM habilitados WHERE nome_apresentacao LIKE '%$buscar%' OR apresentacao LIKE '%$buscar%' OR hashtags LIKE '%$buscar%';";
						$sql = $pdo->prepare($sql);
						$sql->execute();
						return $sql;
					}else {
						$sql = "SELECT * FROM habilitados WHERE status = 1 OR status = 2 ORDER BY id_habilitado DESC LIMIT 0, 9";
						$sql = $pdo->prepare($sql);
						$sql->execute();
						return $sql;
					}
				}

				function buscar_mensagens(){
					$pdo = conectar();
					$sql = "SELECT * FROM chat ORDER BY id_mensagem DESC";
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
				}
				function buscar_uma_conversa($id_remetente,$id_destino){
					$pdo = conectar();
					$sql = "SELECT * FROM usuarios WHERE id_remetente = :id_remetente, id_destino = :id_destino ";
					$sql->bindValue(':id_remetente', $id_remetente);
					$sql->bindValue(':id_destino', $id_destino);
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
				}
				function envia_mensagem($id_remetente,$id_destino,$mensagem_enviada){
					$pdo = conectar();
					try {
							$query = $pdo->prepare("INSERT INTO chat (id_remetente,id_destino,mensagem) VALUES (:id_remetente,:id_destino,:mensagem)");
								$query->bindValue(":id_remetente", $id_remetente);
								$query->bindValue(":id_destino", $id_destino);
								$query->bindValue(":mensagem",$mensagem_enviada);


								$query->execute();

								return true;

					} catch (PDOException $e) {
							echo "Erro ao envia mensagem: ".$e->getMessage();
							return false;
					}
				}
				// parte de comentarios

				function add_comentario($com,$nota,$id_u,$id_p){

					$pdo = conectar();
				    try {
				        $query = $pdo->prepare("INSERT INTO tabela_comentario (comentario, nota, id_u, id_p) VALUES (:comentario,:nota,:id_u,:id_p)");
									$query->bindValue(":comentario", $com);
							    $query->bindValue(":nota", $nota);
									$query->bindValue(":id_u", $id_u);
					        $query->bindValue(":id_p", $id_p);
					        $query->execute();

			            return true;

				    } catch (PDOException $e) {
				        echo "Erro ao adicionar na fotos: ".$e->getMessage();
			          return false;
				    }
				}

				// limita o resultados dos comentarios em 5
				function buscar_comentario_5($id_h){
					$inicio = 5;
					$fim = 1;
					$pdo = conectar();
					// juntadando as tabelas usuario e comentario e buscando pelo id do habilitado
					$sql = "SELECT * FROM tabela_comentario g INNER JOIN usuarios a ON g.id_u = a.id WHERE id_p = :id_p ORDER BY 	id_comentario DESC LIMIT 5;";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_p",$id_h);
					$sql->execute();
					return $sql;
				}

				function buscar_comentario($id_h){
					$pdo = conectar();
					$sql = "SELECT * FROM tabela_comentario g INNER JOIN usuarios a ON g.id_u = a.id;";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_p",$id_h);
					$sql->execute();
					return $sql;
				}
				function buscar_nota_comentario($id_h){
					$pdo = conectar();
					$sql = "SELECT * FROM tabela_comentario WHERE nota and id_p = :id_p";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_p",$id_h);
					$sql->execute();
					return $sql;
				}

				function comentario_encontrado($id_u,$id_h){
					$pdo = conectar();
					// verificar se o usuario já fez algum comentario
					$sql = "SELECT * FROM tabela_comentario WHERE id_u = :id_u and id_p = :id_p";
					$sql = $pdo->prepare($sql);
					$sql->bindValue(":id_p",$id_h);
					$sql->bindValue(":id_u",$id_u);
					$sql->execute();

					// verificar quantos registro tem com essa informação
					if ($sql->rowCount() > 0) {
						return true;
					}else {
						return false;
					}

				}

				// paginação
				function paginacao_proximo($pg){
					$inicio = $pg + 9;
					$fim = $inicio + 8;
					$pdo = conectar();
					$sql = "SELECT * FROM habilitados WHERE status = 1 ORDER BY id_habilitado DESC LIMIT $inicio, $fim";
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
				}
				function  paginacao_anterio($pg){
					$inicio = $pg;
					$fim = $inicio+9;
					$pdo = conectar();
					$sql = "SELECT * FROM habilitados WHERE status = 1 ORDER BY id_habilitado DESC LIMIT $inicio, $fim";
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
				}

				// funções do admin
				function buscar_habilitados_ativo(){
					$pdo = conectar();
					$sql = "SELECT * FROM habilitados WHERE status = 1";
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
				}
				function buscar_habilitados_inativos(){
					$pdo = conectar();
					$sql = "SELECT * FROM habilitados WHERE status = 0";
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
				}
				// funções para parte de denuncia
				function registra_denuncia($mensagem_denuncia,$id_do_u,$id_do_h){
					$pdo = conectar();
					try {
							$query = $pdo->prepare("INSERT INTO denuncia (mensagem,id_fez_denuncia,id_h_denuncia) VALUES (:mensagem_denuncia,:id_do_u,:id_do_h)");
								$query->bindValue(":mensagem_denuncia", $mensagem_denuncia);
								$query->bindValue(":id_do_u", $id_do_u);
								$query->bindValue(":id_do_h",$id_do_h);
								$query->execute();
								status_denuncia($id_do_h);
								return true;
					} catch (PDOException $e) {
							echo "Erro ao realizar denuncia: ".$e->getMessage();
							return false;
					}
				}
				function status_denuncia($id_h){
					$pdo = conectar();
					try {
						  $query = $pdo->prepare("UPDATE habilitados SET status = 2 WHERE id_habilitado = :id_h");
							$query->bindValue(":id_h",$id_h);
							$query->execute();
							return true;
					} catch (PDOException $e) {
							echo "falha ao bloquea habilitado!".$e->getMessage();
							return false;
					}
				}
				function buscar_habilitados_denunciados(){
					$pdo = conectar();
					$array = array();
					$sql = "SELECT * FROM denuncia d INNER JOIN usuarios a ON d.id_fez_denuncia = a.id INNER JOIN habilitados h ON d.id_h_denuncia = h.id_habilitado;";
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
					if ($sql->rowCount() > 0) {
						$array = $sql->fetch();
						return $array;
					}else {
						return false;
					}
				}
				function buscar_habilitados_x($id_h){
					$pdo = conectar();
					$array = array();
					$sql = "SELECT * FROM denuncia d INNER JOIN usuarios a ON d.id_fez_denuncia = a.id INNER JOIN habilitados h ON d.id_h_denuncia = h.id_habilitado WHERE id_h_denuncia = $id_h;";
					// $query->bindValue(":id_h",$id_h);
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
					if ($sql->rowCount() > 0) {
						$array = $sql->fetch();
						return $array;
					}else {
						return false;
					}
				}
				function buscar_h_p_denunciado($id_h){
					$pdo = conectar();
					$array = array();
					$sql = "SELECT id_usuario FROM habilitados WHERE id_habilitado = $id_h;";
					// $query->bindValue(":id_h",$id_h);
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
					// if ($sql->rowCount() > 0) {
					// 	$array = $sql->fetch();
					// 	return $array;
					// }else {
					// 	return false;
					// }

				}
				function bloquea_habilitado($id_h){
					$pdo = conectar();
					try {
						  $query = $pdo->prepare("UPDATE habilitados SET status = 3 WHERE id_habilitado = :id_h");
							$query->bindValue(":id_h",$id_h);
							$query->execute();
							return true;
					} catch (PDOException $e) {
							echo "falha ao bloquea habilitado!".$e->getMessage();
							return false;
					}

				}
				function desbloquea_habilitado($id_h){
					$pdo = conectar();
					try {
						  $query = $pdo->prepare("UPDATE habilitados SET status = 1 WHERE id_habilitado = :id_h");
							$query->bindValue(":id_h",$id_h);
							$query->execute();
							return true;
					} catch (PDOException $e) {
							echo "falha ao desbloquea habilitado!".$e->getMessage();
							return false;
					}

				}
				function buscar_habilitados_bloqueados(){
					$pdo = conectar();
					$sql = "SELECT * FROM denuncia WHERE status = 3";
					$sql = $pdo->prepare($sql);
					$sql->execute();
					return $sql;
				}

				function solicitar_desbloqueio($id_h){
					$pdo = conectar();
					try {
						  $query = $pdo->prepare("UPDATE habilitados SET status = 4 WHERE id_habilitado = :id_h");
							$query->bindValue(":id_h",$id_h);
							$query->execute();
							return true;
					} catch (PDOException $e) {
							echo "falha ao solicitar_desbloqueio!".$e->getMessage();
							return false;
					}

				}
				function desativar($id_h){
					$pdo = conectar();
					try {
						  $query = $pdo->prepare("UPDATE habilitados SET status = 5 WHERE id_habilitado = :id_h");
							$query->bindValue(":id_h",$id_h);
							$query->execute();
							return true;
					} catch (PDOException $e) {
							echo "falha ao desativar perfil!".$e->getMessage();
							return false;
					}

				}
				function ativar($id_h){
					$pdo = conectar();
					try {
						  $query = $pdo->prepare("UPDATE habilitados SET status = 1 WHERE id_habilitado = :id_h");
							$query->bindValue(":id_h",$id_h);
							$query->execute();
							return true;
					} catch (PDOException $e) {
							echo "falha ao ativar perfil!".$e->getMessage();
							return false;
					}

				}

 ?>
