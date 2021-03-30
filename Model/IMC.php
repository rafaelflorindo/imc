<?php
mysqli_report(MYSQLI_REPORT_ALL);
class IMC{
    private $peso, $altura, $resultadoImc, $pressao, $pessoa_id;
    public $conectar;

    public function __construct($peso, $altura, $pressao, $pessoa_id){
        
        $this->setPeso($peso);
        $this->setAltura($altura);
        $this->setPressao($pressao);
        $this->setPessoaId($pessoa_id);

        //conexao com o banco de dados
        try {
            $this->conectar = new mysqli("localhost", "root", "", "clinicanutricao");
        }catch (Exception $e){
            echo "ERRO na conexão: ".$e->getMessage();
        } 
    }

    public function addAtendimento(){
        try{
            $created = date("Y-m-d H:m:s");
            $string = "INSERT INTO atendimento (peso, altura, pressao, Paciente_id, created) 
            values ('{$this->getPeso()}',
                '{$this->getAltura()}',
                '{$this->getPressao()}',
                '{$this->getPessoaId()}', '$created')
                ";
            if($this->conectar->query($string))
                return $this->conectar->affected_rows;
            /*return $hoje;
            if($this->conectar->affected_rows == 1)
                return 1;
            else
                return 0;*/
        }catch (Exception $e){
            echo "ERRO na inserção: ".$e->getMessage();
        }
    }
    public function calcular(){
        $imc = $this->getPeso() / ($this->getAltura() * $this->getAltura());
        $this->setResultadoImc($imc);
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }
    public function setAltura($altura){
        $this->altura = $altura;
    }
    private function setResultadoImc($imc){
        $this->resultadoImc = $imc;
    }
    public function setPressao($pressao){
        $this->pressao = $pressao;
    }
    public function setPessoaId($pessoa_id){
        $this->pessoa_id = $pessoa_id;
    }
    public function getPeso(){
        return $this->peso;
    }
    
    public function getAltura(){
        return $this->altura;
    }
    public function getResultadoImc(){
        return $this->resultadoImc;
    }
    public function getPressao(){
        return $this->pressao;
    }
    public function getPessoaId(){
        return $this->pessoa_id;
    }

}
