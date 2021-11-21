<?php

class Reloj
{
    private $hora;
    private $min;
    private $seg;
    private $segundos;
    private $formato24;
    private $alarma;
    private $activada;
    
    public function __construct ( int $hora, int $minutos, int $segundos, bool $formato24 = true){
        $this->hora = $hora;
        $this->min = $minutos;
        $this->seg = $segundos;
        $this->segundos = 0;
        $this->formato24 = $formato24;
        $this->alarma = 0;
        $this->activada = false;
    }
    
    // Mostrar la hora: genera un String con el  formado de hora  22:30:23
    // o 10:30:23 pm si el atributos Formato24 es falso
    
    public function mostrar(){
        $mensaje = $this->formato24? $this->hora : $this->hora - 12;
        $mensaje.= ":".$this->min.":".$this->seg;

        return $mensaje;
        
    }
    
    // Cambiar formato24, recibe un valor true si quiero formato de
    // 24 o falso si quiero de 12
    public function  cambiarFormato24( bool $formato24){
        $this->formato24 = $formato24;
    }
    
    // Incrementa en un segundo el valor de reloj
    public function tictac (){
        $this->seg++;
        $this->segundos++;

        //1 minuto
        if($this->seg >= 60){
            $this->seg =0;
            $this->min++;
        }
        
        //1 hora
        if($this->min >= 60){
            $this->seg =0;
            $this->min =0;
            $this->hora++;
        }
        //1 dia
        if($this->segundos >= 86400){
            $this->segundos = 0;
        }

        if(($this->formato24 && $this->hora >= 24) || (!$this->formato24 && $this->hora >= 12)){
            $this->seg = 0;
            $this->min = 0;
            $this->hora = 0;
        }
    }
    
    // Comparar Hora, recibe como parámetro otro objeto Reloj
    // y me devuelve el número de segundos que tienen de diferencia
    
    public function comparar ( Reloj $otroreloj){
        
        return $this->segundos - $otroreloj->segundos;
    }    

    //ver alarma
}