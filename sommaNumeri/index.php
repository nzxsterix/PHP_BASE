<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somma Numeri</title>
</head>
<body>

    <?php

        // Inizializzo la somma a zero
        $somma = 0;

        // Creo un array con i numeri da sommare
        $numeri = [1,2,3,4,5,6,7,8,9,10];
    
        // Ciclo attraverso i numeri da 1 a 10 e li sommo
        for ($i = 1; $i <= 10; $i++) {
            $somma += $i;
        }

        // Stampo il risultato
        echo "<p>La somma dei numeri da 1 a 10 è: $somma</p>";
    ?>
    
</body>
</html>