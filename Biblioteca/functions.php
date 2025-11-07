<?php

    //importo la classe Contact
    require_once 'book.php';

    //funzione che aggiunge un contatto alla rubrica
    function addBook(array &$books, string $titolo, string $autore, int $anno, float $prezzo, int $numeroPagine) : void {   //void è un tipo di ritorno, posso anche ometterlo ma significa che restituisce nulla

        //devo creare un oggetto contatto che si aggiunge all array rubrica
        $books[] = new book($titolo, $autore,$anno, $prezzo, $numeroPagine);


    }


    //funzione che stampa tutti i contatti quindigli oggetti della rubrica salvata nella sessione
    function printBooks(array &$books) : void {

        foreach ($books as $book){

            echo $book->getInfo() . "<br>"; //vado a recuperare il metodo getInfo()

        }

        
    }


    //ricerca del contatto per nome, restituisco l oggetto o null
    function searchBook(array $books, string $titolo): ?book {

        //scorro la rubrica
        foreach ($books as $book){

            //confronto i nomi in minuscolo
            if(strtolower($book->titolo) === strtolower($titolo)){

                return $book;
            }

        }

        return null; // nessun contatto trovato

    }




?>