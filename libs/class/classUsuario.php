<?php

class Usuario{
	private $nome;
	private $sobreNome;
	private $email;
	private $telefone;
	private $senha;
  private $nascimento;
  private $cpf;


	public function setNome($nome){
		$this->nome = $nome;
	}
  public function getNome(){
		return $this->nome;
	}

  public function setSobreNome($sobreNome){
    $this->sobreNome = $sobreNome;
  }

  public function getSobreNome(){
		return $this->sobreNome;
	}

  public function setEmail($email){
    $this->email = $email;
  }

  public function getEmail(){
		return $this->email;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

  public function getTelefone(){
		return $this->telefone;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

  public function getSenha(){
		return $this->senha;
	}

	public function setNascimento($nascimento){
		$this->nascimento= $nascimento;
	}

  public function getNascimento(){
		return $this->nascimento;
	}


	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

  public function getCpf(){
		return $this->cpf;
	}

}
?>
