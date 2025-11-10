<?php

    //importo la classe Contact
    require_once 'book.php';

    //funzione che aggiunge un contatto alla rubrica
    function addBook(array &$books, string $titolo, string $autore, int $anno, float $prezzo, int $numeroPagine) : void {   //void è un tipo di ritorno, posso anche ometterlo ma significa che restituisce nulla

        //devo creare un oggetto contatto che si aggiunge all array rubrica
        $books[] = new book($titolo, $autore,$anno, $prezzo, $numeroPagine);


    }


   // funzione che elimina un libro dalla lista
function deleteBook(array &$books, string $titolo) : void {

    // scorro l’array per trovare il libro da eliminare
    foreach ($books as $index => $book) {

        if (strtolower($book->titolo) === strtolower($titolo)) {

            unset($books[$index]);  // rimuove l’elemento dall’array
            // reindicizzo l’array per evitare “buchi” negli indici
            $books = array_values($books);

            return; // esce dopo aver eliminato il primo libro trovato
        }
    }
}


    //funzione che stampa tutti i contatti quindigli oggetti della rubrica salvata nella sessione
    function printBooks(array &$books) : void {
    if (empty($books)) {
        echo "<p>Nessun libro presente.</p>";
        return;
    }
    //scorro l array dei libri
    echo '<ul>';
    foreach ($books as $book) {
        echo '<li class="mb-2">';
        echo htmlspecialchars($book->getInfo());

        // Aggiungo il form per eliminare il libro accanto a ogni libro nella lista
        echo '
            <form action="" method="POST" style="display:inline-block; margin-left:10px;">
                <input type="hidden" name="titolo" value="' . htmlspecialchars($book->titolo) . '">
                <button class="btn btn-danger" type="submit" name="delete">Elimina</button>
            </form>
        ';
        echo '</li>';
    }
    echo '</ul>';
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