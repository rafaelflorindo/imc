<?php
//validar peso e altura
//pressao, pessoa_id
    if(isset($_POST) && !empty($_POST)){
        if(
            isset($_POST["peso"]) && 
            isset($_POST["altura"]) && 
            isset($_POST["pressao"]) &&
            isset($_POST["pessoa_id"]) &&
            !empty($_POST["peso"]) &&
            !empty($_POST["altura"]) &&
            !empty($_POST["pressao"]) &&
            !empty($_POST["pessoa_id"])
            ){
                $peso = filter_input(INPUT_POST, 'peso');
                $altura = $_POST["altura"];
                $pressao = $_POST["pressao"];
                $pessoa_id = $_POST["pessoa_id"];

                include("../Model/IMC.php");
                $calculo = new IMC($peso, $altura, $pressao, $pessoa_id);
                $retorno = $calculo->addAtendimento();
                //echo $retorno ? "Gravado com Sucesso" : "Erro ao gravar";
                if($retorno){
                    $calculo->calcular();
                    $resultado = $calculo->getResultadoImc();
                   
                    /*echo "<hr>";
                    echo "IMC = " . $resultado;
                    echo "<br>";*/
                    header('location: ../view/resultado.php?resultado='.$resultado);
   
                }
                
                //echo $resultado < 18.5 ? "Classificação: Magresa <br>Grau de Obesidade: 0": "";

               /* if($resultado < 18.5){
                    echo "Classificação: Magresa";
                    echo "<br>Grau de Obesidade: 0";
                }elseif($resultado < 24.9) {
                    echo "Classificação: Normal";
                    echo "<br>Grau de Obesidade: 0";
                }elseif($resultado < 29.9) {
                    echo "Classificação: SOBREPESO";
                    echo "<br>Grau de Obesidade: I";
                }elseif($resultado < 39.9) {
                    echo "Classificação: Obesidade";
                    echo "<br>Grau de Obesidade: II";
                }elseif($resultado > 40) {
                    echo "Classificação: Obesidade Grave";
                    echo "<br>Grau de Obesidade: III";
                }else{
                    echo "---";
                }*/
        }else{
            echo "Há um campo não preenchido!!!";
        }
    }else{
        echo "Não existem valores para o calculo do IMC";
    }