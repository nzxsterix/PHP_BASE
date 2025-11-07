<?php

    //Modellazione Utente
    class Contact {

        //attributi
        public string $name;
        public string $phone;
        //Costruttore
        public function __construct(string $name, $phone) {
            $this->name = $name;
            $this->phone = $phone;
        }

        //metodo o funzione
        public function getInfo(): string {
            //ritorna il nome
            return "Nome : $this->name - Telefono $this->phone";
        }
    
    
    }

 




?>