<?php

    //--------------------------------MODELLAZIONE CON CLASSI E OGGETTI--------------------------------

        //Classe genitore

        //Dichiarazione di una classe animale
        class Animale {
            
            //Proprietà della classe
            public $nome;
            public $specie;
            public $peso;
            public $habitat;

            //Costruttore della classe
            public function __construct($nome, $specie, $peso, $habitat) {
                $this->nome = $nome;
                $this->specie = $specie;
                $this->peso = $peso;
                $this->habitat = $habitat;
            }

            //La classe animale può avere una funzione o più funzioni
            public function faiVerso() {
                return "";
            }
        }

        //Classe figlio cane di animale
        class Cane extends Animale {
            
            //con il suo verso
            public function faiVerso() {
                return "Abbaia";
            }
        }

        //Classe figlio gatto di animale
        class Gatto extends Animale {
            
            //con il suo verso
            public function faiVerso() {
                return "Miagola";
            }
        }

    //--------------------------------UTILIZZO CON OGGETTI--------------------------------

    //Creazione di un oggetto di tipo cane
    $cane = new Cane(nome: "Sunny", specie: "Husky", peso: 30, habitat: "Giardino");
    // Creazione di un oggetto di tipo gatto
    $gatto = new Gatto(nome: "Felix", specie: "Siamese", peso: 5, habitat: "Casa");

    //Funzione per far parlare gli animali
    function faiParlare(Animale $animale) {
        //Stampa le informazioni dell'animale
        echo "{$animale->specie}({$animale->nome}) dice: " . $animale->faiVerso() . "<br>";
        echo "Peso : {$animale->peso} kg, e l habitat è : {$animale->habitat} <br><br>";
    }

    //Far parlare gli animali
    faiParlare(animale: $cane);
    faiParlare (animale: $gatto);  
?>