  <!--Importazione del header-->
    <?php include 'header.php'; ?>

   <!--contenuto main del sito-->
    <main>

        <h2>Biblioteca</h2>

        
        <?php

            //importo il file functions perchè devo utilizzare le funzioni in questo file
            require_once 'functions.php';


            //-----------------------------LOGICA SALVATAGGIO SESSIONSTORAGE---------------------------

            //Inizializzo i libri con la sessione
            session_start();

            if(!isset($_SESSION['books'])){

                $_SESSION['books'] = []; // prima volta : libri nella sessione del browser

            }

            //Devo fare un riferimento all array della sessione con &
            $books = &$_SESSION['books'];


            //-------------------------------------------------------------------------------------------


            //gestione invio form per aggiungere book
            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])){

                $titolo = ($_POST['titolo']); // prendo il titolo dall input e lo salvo uin una variabile
                $autore = ($_POST['autore']);
                $anno = intval($_POST['anno']);
                $prezzo = floatval($_POST['prezzo']);
                $numeroPagine = intval($_POST['numeroPagine']);

                //controllo che i campi non siano vuoti
                if ($titolo && $autore && $anno && $prezzo && $numeroPagine){

                    addBook($books, $titolo, $autore, $anno, $prezzo, $numeroPagine ); // aggiungo il libro ai libri

                    $message = "Libro aggiunto!";

                }else{

                    $message = "Inserisci tutti i dati del libro...";
                }
            }


            //gestione di ricerca contatto
            
            $searchResult = null;
            // inizializzo la variabile
            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])){

                
                $searchTitolo = trim($_POST['search_titolo']); // prendo il titolo da cercare
                $searchResult = searchBook($books, $searchTitolo);// cerco il titolo nei libri

            }



        ?>
        <h1> Libri</h1>



            <!--Inserimento Contatto-->
            <h2>Aggiungi Libro</h2>
            <form action="" method="POST">

                Titolo : <input type="text" name="titolo">
                Autore : <input type="text" name="autore">
                Anno : <input type="number" name="anno">
                Prezzo : <input type="number" name="prezzo">
                Numero Pagine : <input type="number" name="numeroPagine">

                <button type="submit" name="add">Aggiungi</button>

            </form>


            <!--Ricerca del contatto-->
            <h2>Ricerca Contatto</h2>
            <form action="" method="POST">

                titolo : <input type="text" name="search_titolo">

                <button type="submit" name="search">Cerca</button>

            </form>


            <?php

                //campo ricerca
                if($searchResult !== null){

                    //contatto trovato
                    echo "Risultato : " . $searchResult->getInfo();

                }elseif (isset($_POST['search'])){

                    echo "Contatto non trovato";

                }

            ?>





            <!--Per stampare tutti i contatti devo andare a prender la rubrica salvata nella sessione attraverso la funzione printContacts()-->
            <h2>Elenco Contatti</h2>

            <?php

                printBooks($books);

            ?>





            <!--Sezione di debug in formato testo originale-->
            <h2>Debug sessione</h2>

            <pre> <?php  print_r($_SESSION)  ?> </pre>


    </main>



     <!--Importazione del footer-->
    <?php include 'footer.php'; ?>