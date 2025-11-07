<?php
    //Definizione della classe Contact
    class book {

        //Attributi
        public string $titolo;
        public string $autore;
        public int $anno;
        public float $prezzo;
        public int $numeroPagine;

        //Costruttore
        public function __construct(string $titolo, string $autore, int $anno, float $prezzo, int $numeroPagine) {

            $this->titolo = $titolo;
            $this->autore = $autore;
            $this->anno = $anno;
            $this->prezzo = $prezzo;
            $this->numeroPagine = $numeroPagine;

        }

        //Metodo o Funzione
        public function getInfo(): string {
            //restituisco le info del libro
            return "titolo : $this->titolo - autore $this->autore - anno $this->anno - prezzo $this->prezzo - numero pagine $this->numeroPagine";

        }
    }
?>