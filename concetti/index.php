<!--------------- VARIE--------------------->


<?php 

    //commento su una riga
    /*commento su più righe*/

    //string -> stringa di caratteri
    //int -> numeri interi
    //float -> numeri con la virgola
    //bool -> booleano (true/false)
    // [] -> array (collezione di valori)
    //{} -> oggetto (collezione di valori e funzioni)

    // Dichiaro una variabile con $
    //$nome = "pippo";

    //stampa a schermo il contenuto della variabile
    //echo "questa funzione stampa a schermo il contenuto di qualcosa ad esempio una variabile:  ", $nome;



    //var_dump(): mostra informazioni dettagliate su una variabile (valore,tipo,lunghezza)
    //var_dump($nome);

?>


<!--------------- VARIABILI--------------------->

<?php

    $nome = "Luca"; //string
    $eta = 35; //int

    echo "Ciao $nome, hai  $eta  anni!";
    var_dump($nome);

?> 


<!--------------- COSTANTI--------------------->

<?php

    //definisco una costante con define()
    define("PI_GRECO", 3.14);
    define("tassa_stato", 26);
    define("inps",15);
    define("commercialista",800);
   
    //stampo a schermo il valore della costante
    echo "Il valore di PI_GRECO è: ", PI_GRECO;
    echo tassa_stato;
    echo inps;
    echo commercialista;
    
?>



<!--------------- CONDIZIONI IF-ELSE--------------------->

<?php

    $numero = 5;
    if ($numero > 0) {
        echo "positivo";
    } else {
        echo "negativo o zero";
    }


?>


<!--------------- SWITCH CASE--------------------->

<?php

    //Il costrutto switch case brake default viene utilizzato per non annidare troppi if-else
    $colore = "rosso";

    switch ($colore) {

        case "rosso":
            echo "Il colore è rosso";
            break;
            
        case "blu":
            echo "Il colore è blu";
            break;
           
        case "verde":
            echo "Il colore è verde";
            break;
           
        default:
            echo "Colore non riconosciuto";
            
            
    }

?>

<!--------------- CICLI FOR--------------------->

<?php

    //Ciclo for
    for ($i = 1; $i <= 5; $i++) {
        echo "Numero: $i <br> ";
    }
?>


<!--------------- CICLI WHILE--------------------->  

<?php

    //Ciclo while
    $i = 1;
    while ($i <= 3) {
        echo "Numero: $i <br> ";
        $i++;
    }
?>


<!--------------- CICLO FOREACH--------------------->

<?php

    //Ciclo foreach per array
    $nomi = ["Pippo", "Paperino", "Pluto"];

    foreach ($nomi as $nome) {
        echo "Nome: $nome <br> ";
    }
?>

<!---------------FUNZIONI--------------------->
<?php

    //Definizione di una funzione
    function saluta($nome) {
        return "Ciao, $nome";
    }

    //Chiamata della funzione
    echo saluta("Mario");
