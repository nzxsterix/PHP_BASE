  <!--Importazione del header-->
    <?php include 'header.php'; ?>

   <!--contenuto main del sito-->
    <main class="container mt-4 mb-5 bg-light">

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


            //gestione cancella book

            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
                $titolo = trim($_POST['titolo']);

                if ($titolo) {
                    deleteBook($books, $titolo);
                    $message = "Libro eliminato con successo.";
                } else {
                    $message = "Inserisci il titolo del libro da eliminare.";
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

 <body>
            
       
        <!--Form per aggiungere libro-->
        <h2 class="mt-4 mb-3">Aggiungi Libro</h2>

            <form action="" method="POST" class="container mt-3">
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="titolo" placeholder="Inserisci il titolo">
                </div>

                <div class="col-md-6 col-lg-4">
                <label for="autore" class="form-label">Autore</label>
                <input type="text" class="form-control" name="autore" placeholder="Inserisci l'autore">
                </div>

                <div class="col-md-4 col-lg-2">
                <label for="anno" class="form-label">Anno</label>
                <input type="number" class="form-control" name="anno" placeholder="2020">
                </div>

                <div class="col-md-4 col-lg-2">
                <label for="prezzo" class="form-label">Prezzo</label>
                <input type="number"  class="form-control" step="any" name="prezzo" placeholder="0.00">
                </div>

                <div class="col-md-4 col-lg-2">
                <label for="numeroPagine" class="form-label">Numero Pagine</label>
                <input type="number" class="form-control" name="numeroPagine" placeholder="100">
                </div>

                <div class="col-12 mt-3">
                <button type="submit" name="add" class="btn btn-primary w-100">Aggiungi</button>
                </div>
            </div>
            </form>


            <!--Ricerca del contatto-->
        <h2>Ricerca Contatto</h2>
            <form class="mt-3" action="" method="POST">

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

            <h2>Grafico dei libri</h2>
                <div style="height: 400px;">
                    <canvas id="booksChart"></canvas>
                </div>


            <!--Per stampare tutti i libri devo andare a prender i books salvati nella sessione attraverso la funzione printBooks()-->
            <h2 class="mt-5">Elenco libri</h2>

            <?php

                printBooks($books);

            ?>

            <!--Sezione di debug in formato testo originale-->
            <h2>Debug sessione</h2>

            <pre> <?php  print_r($_SESSION)  ?> </pre>

    
    </main>
    <style>
        body {
            background-color: #414345ff;
        }
    </style>

     <!--Importazione del footer-->
    <?php include 'footer.php'; ?>

        <!--chart.js-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        const ctx = document.getElementById('booksChart').getContext('2d');

        const booksChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php foreach($books as $book) { echo "'".addslashes($book->titolo)."',"; } ?>
                ],
                datasets: [{
                    label: 'Prezzo dei libri',
                    data: [
                        <?php foreach($books as $book) { echo floatval($book->prezzo).","; } ?>
                    ],
                    backgroundColor: 'rgba(49, 121, 170, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const index = context.dataIndex;
                                const autori = [
                                    <?php foreach($books as $book) { echo "'".addslashes($book->autore)."',"; } ?>
                                ];
                                const pagine = [
                                    <?php foreach($books as $book) { echo intval($book->numeroPagine).","; } ?>
                                ];
                                const prezzo = context.dataset.data[index];
                                return `Prezzo: ${prezzo}, Autore: ${autori[index]}, Pagine: ${pagine[index]}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>

</body>
</html>