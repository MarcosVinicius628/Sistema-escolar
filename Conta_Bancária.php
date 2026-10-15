<?php

class Conta_Bancária {
    private int $numero;
    private string $nome;
    private int $cpf;
    private string $agencia;
    private string $tipo;
    private float $saldo;
    private bool $status;
    
   public function __construct(int $numero, string $nome, int $cpf, string $agencia, string $tipo) {
        $this->numero = $numero;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->agencia = $agencia;
        $this->tipo = $tipo;
        $this->saldo = 0;
        $this->status = true;
    }

    public function getNumero() {
        return $this->numero;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getAgencia() {
        return $this->agencia;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setNumero(int $numero) {
        $this->numero = $numero;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function setCpf(int $cpf) {
        $this->cpf = $cpf;
    }

    public function setAgencia(string $agencia) {
        $this->agencia = $agencia;
    }

    public function setTipo(string $tipo) {
        $this->tipo = $tipo;
    }

    public function setSaldo(float $saldo) {
        $this->saldo = $saldo;
    }

    public function setStatus(bool $status) {
        $this->status = $status;
    }

    public function Apresentar_dados ()
        {
            if($this->status == false) {
                echo "Não é possível consultar seus dados, pois a conta está inativa." . "<br>";
                return;
            }
            echo "Número da conta: " . $this->getNumero() . "<br>";
            echo "Nome do titular: " . $this->getNome() . "<br>";
            echo "CPF do titular: " . $this->getCpf() . "<br>";
            echo "Agência: " . $this->getAgencia() . "<br>";
            echo "Tipo de conta: " . $this->getTipo() . "<br>";
            echo "Saldo: R$" . number_format($this->getSaldo(), 2, ',', '.') . "<br>";
            echo "Status da conta: " . ($this->getStatus() ? 'Ativa' : 'Inativa') . "<br>";
        }

    public function depositar(float $valor) {
        if($this->status == false) {
            echo "Não é possível realizar o depósito, pois a conta está inativa." . "<br>";
        } elseif($valor <= 0) {
            echo "Não é possível realizar o depósito, pois o valor é inválido." . "<br>";
        } else {
            $this->saldo += $valor;
            echo "Depósito realizado com sucesso!" . "<br>";
        }
    }

    public function sacar(float $valor) {
        if($this->saldo  < $valor || $valor <= 0) {
            echo "Não é possível realizar o saque, pois o valor é inválido ou o saldo é insuficiente." . "<br>";
        }elseif($this->status == false) {
            echo "Não é possível realizar o saque, pois a conta está inativa." . "<br>";
        } else {
            echo "Saque realizado com sucesso!" . "<br>";
            $this->saldo -= $valor;
        }
    }

    public function consultarSaldo() {
        if($this->status == false) {
            echo "Não é possível consultar o saldo, pois a conta está inativa." . "<br>";
        } else {
            echo "Saldo atual: R$" . number_format($this->saldo, 2, ',', '.') . "<br>";
        }
    }

    public function alterarTitular(string $nome) {
        $this->nome = $nome;
        echo "Titular alterado com sucesso!" . "<br>";
    }
    
    public function bloqueiodeConta() {
        if($this->status == true) {
            $this->status = false;
            echo "Conta bloqueada com sucesso!" . "<br>";
        } else {
            echo "A conta já está bloqueada." . "<br>";
        }
    }
    
    public function desbloqueiodeConta() {
        if($this->status == false) {
            $this->status = true;
            echo "Conta desbloqueada com sucesso!" . "<br>";
        } else {
            echo "A conta já está desbloqueada." . "<br>";
        }
    } 

    public function transferencia(float $valor, Conta_Bancária $contaDestino) {
        if($this->status == false) {
            echo "Não é possível realizar a transferência, pois a conta está inativa." . "<br>";
            return;
        }
        if($contaDestino->getStatus() == false) {
            echo "Não é possível realizar a transferência, pois a conta de destino está inativa." . "<br>";
            return;
        }
        if($this->saldo < $valor || $valor <= 0) {
            echo "Não é possível realizar a transferência, pois o valor é inválido ou o saldo é insuficiente." . "<br>";
            return;
        }
        $this->saldo -= $valor;
        $contaDestino->depositar($valor);
        echo "Transferência realizada com sucesso!" . "<br>";
    }

        public function emitirRelatorio() {
            echo "Relatório da conta:" . "<br>";
            echo "Número da conta: " . $this->getNumero() . "<br>";
            echo "Nome do titular: " . $this->getNome() . "<br>";
            echo "CPF do titular: " . $this->getCpf() . "<br>";
            echo "Agência: " . $this->getAgencia() . "<br>";
            echo "Tipo de conta: " . $this->getTipo() . "<br>";
            echo "Saldo: R$" . number_format($this->getSaldo(), 2, ',', '.') . "<br>";
            echo "Status da conta: " . ($this->getStatus() ? 'Ativa' : 'Inativa') . "<br>";
        }
    }

$conta1 = new Conta_Bancária(1001, "Ana Souza", 12345678901, "Central", "Corrente");
$conta2 = new Conta_Bancária(1002, "Carlos Oliveira", 98765432100, "Central", "Poupança");
$conta3 = new Conta_Bancária(1003, "Mariana Lima", 45678912345, "Central", "Corrente");

$conta1->depositar(500);
$conta1->sacar(100);
$conta1->depositar(0);
$conta1->sacar(1000);
$conta1->alterarTitular("Ana Paula Souza");
$conta1->bloqueiodeConta();
$conta1->sacar(50);
$conta1->consultarSaldo();
$conta1->desbloqueiodeConta();
$conta1->depositar(200);
$conta1->transferencia(300, $conta2);
$conta1->transferencia(600, $conta3);
$conta1->consultarSaldo();
$conta1->emitirRelatorio();