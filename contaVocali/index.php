<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Vocali</title>
</head>
<body>

    <!--Chiedo la parola per contare le vocali-->
    <form action="index.php" method="post">
        <label for="parola">Inserisci una parola:</label>
        <input type="text" id="parola" name="frase" required>
        <input type="submit" value="Conta Vocali">
    </form>

        <?php
            // Conto le vocali nella parola inserita
            if (isset($_POST['frase'])) {
                // Converto il valore in intero per sicurezza
                $frase = strtolower($_POST['frase']);
    
                // Definisco le vocali da contare
                $vocali = ['a', 'e', 'i', 'o', 'u'];
                // Inizializzo il contatore delle vocali
                $vocali_count = 0;
                // Ciclo attraverso ogni vocale
                for($i = 0; $i < strlen($frase); $i++) {
                    // Controllo se il carattere corrente è una vocale
                    if (in_array($frase[$i], $vocali)) {
                        //  Incremento il contatore delle vocali
                        $vocali_count++;
                    }
                }
               
                // Se ci sono vocali, stampo il conteggio 
                echo "La parola '$frase' contiene $vocali_count vocali.";
            }
            
        ?>
</body>
</html>