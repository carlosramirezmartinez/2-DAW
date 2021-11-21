<?php

class Coche
{
    // Definir los atributos
    private $modelo;
    private $distanciaTotal;
    private $distanciaParcial;
    private $motor;
    private $velocidad;
    private $velocidadMax;

    
    // Completar los métodos
    
    function __construct ( String $modelo, int $velocidadMax){
        $this->modelo = $modelo;
        $this->motor = false;
        $this->distanciaTotal = 0;
        $this->distanciaParcial = 0;
        $this->velocidad = 0;
        $this->velocidadMax = $velocidadMax;
    }
    
    public function  arrancar():bool{
        if ($this->motor){
            $this->infoError("El coche arrancó");
            return false;
        }else{
            $this->motor = true;
            return true;
        }
    }
    
    public function parar():bool{
        $resu = false;
        if($this->motor){
            $this->motor = false;
            $this->distanciaParcial = 0;
            $this->distanciaTotal = 0;
            $resu = true;
        }
        else{
            $this->infoError("El coche esta parado");
        }
        return $resu;
    }
    
    public function acelera( int $cantidad):bool{
        if ( $this->motor){
            $this->velocidad = $this->velocidad + $cantidad;
            return true;
        }
        else{
            $this->infoError("Motor parado");
            return false;
        }
    }
    
    public function frena ( int $cantidad):bool{
        if ( $this->motor && $this->velocidad!=0){
            $this->velocidad = $this->velocidad - $cantidad;
            return true;
        }
        else{
            $this->infoError("Motor parado");
            return false;
        }
    }
    
    public function recorre ():bool{
        return true;
    }
    
    public function info():string{
        //tostring
        //ver como meter el estado
        $mensaje = "";
        $mensaje .= "<br>Modelo: ".$this->modelo."<br>";
        $mensaje .= "<br>Velocidad:  ".$this->velocidad."<br>";
        $mensaje .= "<br>Km parciales:  ".$this->distanciaParcial."<br>";
        $mensaje .= "<br>Km totales:  ".$this->distanciaTotal."<br>";
        
        return $mensaje;
    }
    
    public function getKilometros():int{
        return $this->distanciaParcial;
    }
    
    private function infoError( String $mensaje):void{
        echo $mensaje;
    }	
}
