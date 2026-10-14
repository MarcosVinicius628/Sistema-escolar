<?php

class Aluno
{
	private string $nome;
	private int $idade;
	private string $curso;
	private bool $matriculado;
	private float $nota1;
	private float $nota2;
	
	public function __construct (string $nome, int $idade, string $curso)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->curso = $curso;
		$this->matriculado = false;
		$this->nota1 = 0.0;
		$this->nota2 = 0.0;		
	}
	
// getters e setters

	public function getnome(): string
	{
		return $this->nome;
	}
	
	public function getidade(): int
	{
		return $this->idade;
	}
	
	public function getcurso(): string
	{
		return $this->curso;
	}
	public function getmatriculado(): bool
	{
		return $this->matriculado;
	}
	public function getnota1() : float
	{
		return $this->nota1;
	}
	public function getnota2() : float
	{
		return $this->nota2;
	}

// setters
	public function setnome(string $nome): void
	{
			$this->nome = $nome; 
		}
	
	public function setidade(int $idade) : void
	{
		$this->idade = $idade;
	}
	
	public function setcurso(string $curso) : void 
	{
		$this->curso = $curso;
	}
	
	public function setmatriculado(bool $matriculado) : void
	{
		$this->matriculado = $matriculado;
	}

	public function setnota1(float $nota1) : void
	{
		$this->nota1 = $nota1;
	}

	public function setnota2(float $nota2) :void
	{
		$this->nota2 = $nota2;
	}

	public function matricula() : void
	{
		if($this->matriculado == false) {
			$this->matriculado = true;
			echo "Aluno matriculado!";
		}else{
			echo"O aluno já está matriculado";
		}
	}

 	public function cancelarMatricula() : void
	{
		if($this->matriculado == true) {
			$this->matriculado = false;
			echo "Matricula cancelada.";
		}else{
			echo"O aluno já possui a matricula inativa"."<br>";
		}
	}
	public function verificarMaioridade() :void
	{
		if($this->idade >= 18){
			echo "O aluno possui a idade para participar e cursos noturnos";
		}else{
			echo"O aluno não possui maioridade";
		}
	}
	public function Cadastrarnotas(float $nota1, float $nota2) : void
	{
		if ($this->matriculado == false) {
			echo"O aluno não está matriculado, portanto não é possível cadastrar as notas";
			return;
		}
			if($nota1 < 0 || $nota2 < 0) {
				echo "As notas não podem ser negativas";
			}else{
				$this->nota1 = $nota1;
				$this->nota2 = $nota2;
				echo "As notas do aluno foram cadastradas";

		} 
	}

	public function calcularMedia()
	{
		if($this->nota1 > 0 || $this->nota2 > 0) {
			return ($this->nota1 + $this->nota2) / 2;
		}else{
			echo "As notas do aluno não foram cadastradas";}
	}
	public function verificarAprovacao() :void
	{
		if($this->calcularMedia() >= 20){
			echo "Aluno aprovado!";
		}else{
			echo "Aluno reprovado!";
		}
	}
	public function exibirInformacoes() :void
	{
		echo "Nome: " . $this->nome . "<br>";
		echo "Idade: " . $this->idade . "<br>";
		echo "Curso: " . $this->curso . "<br>";
		if($this->matriculado) {
			echo "Matriculado: Sim<br>";
		} else {
			echo "Matriculado: Não<br>";
		}
		echo "Nota 1: " . $this->nota1 . "<br>";
		echo "Nota 2: " . $this->nota2 . "<br>";
	}
}
	$Aluno1 = new Aluno("João", 20, "Matemática");
	$Aluno1->matricula();
	$Aluno1->Cadastrarnotas(70, 80);
	$Aluno1->exibirInformacoes();
	$Aluno1->verificarAprovacao();
	$Aluno1->cancelarMatricula();


