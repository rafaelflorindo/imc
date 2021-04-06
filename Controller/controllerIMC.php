<?php
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
                $altura = filter_input(INPUT_POST, 'altura');
                $pressao = filter_input(INPUT_POST, 'pressao');
                $pessoa_id = filter_input(INPUT_POST, 'pessoa_id');

                include("../Model/IMC.php");
                $calculo = new IMC();
                $retorno = $calculo->addAtendimento($peso, $altura, $pressao, $pessoa_id);
               
                if($retorno){
                    $calculo->calcular();
                    $resultado = $calculo->getResultadoImc();
                    header('location: ../index.php?pagina=View/formulario.php&erro=nao&mensagem=Sucesso!!!&resultado='.$resultado);
                }else{
                    header('location: ../index.php?pagina=View/formulario.php&erro=sim&mensagem=Não foi possível armazenar valor!!!');
                    //echo "Não foi possível armazenar valor!!!";
                }
        }else{
            header('location: ../index.php?pagina=View/formulario.php&erro=sim&mensagem=Há um campo não preenchido!!!');
        }
    }else{
        header('location: ../index.php?pagina=View/formulario.php&erro=sim&mensagem=Não existem valores para o calculo do IMC');
        //echo "Não existem valores para o calculo do IMC";
    }