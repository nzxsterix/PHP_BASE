<?php

    class forma {

        //Funzione per calcolare l'area
        public function Area() {
            return 0; // Valore di default
        }

        //Funzione per la descrizione
        public function descrizione() {
            return "Questa è una forma geometrica.";
        }
    }


    //Classe figlio cerchio
    class cerchio extends forma {
        //raggio x calcolo area cerchio
        public $raggio;

        //Costruttore della classe
        public function __construct($raggio) {
            $this->raggio = $raggio;
        }

        //funzione calcolo area Area
        public function Area() {
            return round(pi() * pow($this->raggio,2),2);
        }
        

        //funzione descrizione
        public function descrizione() {
            return "cerchio con raggio di {$this->raggio}.";
        }
    }

    //Classe figlio rettangolo
    class rettangolo extends forma {    
        public $base;
        public $altezza;

        //Costruttore della classe

        public function __construct($base, $altezza) {
            $this->base = $base;
            $this->altezza = $altezza;
        }

        //funzione Area
        public function Area() {
            return $this->base * $this->altezza;
        }

        //funzione descrizione
        public function descrizione() {
            return "rettangolo {$this->base} x {$this->altezza}.";
        }
    }

    //utilizzo con oggetti
    function mostraArea(forma $forma) {
        echo "La forma è un " . $forma->descrizione() ."<br>";
        echo "Area: " . $forma->Area() . "cm2 <br><br>";
    }

    //Creazione di un array di forme con due oggetti
    $forme = [
        new cerchio(7),
        new rettangolo(5, 10)
    ];

    //Mostra l'area di ogni forma
    foreach ($forme as $forma) {
        mostraArea($forma);
    }

?>