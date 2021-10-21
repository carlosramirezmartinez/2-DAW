<?php
    function sumar($num1, $num2, &$resu){
        $resu = $num1 + $num2;
        return $resu;
    }

    function restar($num1, $num2, &$resu){
        $resu = $num1 - $num2;
        return $resu;
    }

    function multi($num1, $num2, &$resu){
        $resu = $num1 * $num2;
        return $resu;
    }

    function divi($num1, $num2, &$resu){
        $resu = $num1 / $num2;
        return $resu;
    }

    function modulo($num1, $num2, &$resu){
        $resu = $num1 % $num2;
        return $resu;
    }

    function potencia($num1, $num2, &$resu){
        $resu = $num1 ** $num2;
        return $resu;
    }
?>