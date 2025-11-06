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



        <form method="post" action="">
        <input type="number" name="numero" placeholder="Inserisci numero" required>

    <?php

        //tabellina di un numero
        // prendo la variabile numero inserita nel form
        if (isset($_POST['numero'])) {
            $numero = $_POST['numero'];
        }

        // Ciclo attraverso i numeri da 1 a 10 per calcolare la tabellina
        for ($i = 1; $i <= 10; $i++) {
               
            // Stampo il risultato della moltiplicazione (numero x i)
            echo "<p>$numero x $i = " . ($numero * $i) . "</p>";
        }
 
    ?>

</body>
</html>