<?php

$resultado = filter_input(INPUT_GET, 'resultado');
echo "Índice de massa : " . number_format($resultado, 2, '.', '');
echo "<br>";

if($resultado < 18.5){
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
}
?>