<?php

    if(isset($_GET['parola']));

        // prendo la parola dall'input e tramite il metodo STRTOLOWER la trasformo in minuscolo

        $parola = strtolower($_GET['parola']);// strtoLower trasforma in minuscolo
        $parola_invertita = strrev($parola);// strrev inverte la stringa

        // confronto le due parole
        if($parola == $parola_invertita){
            echo "<p>La parola $parola è un palindromo </p>";
        } else {
            echo "<p>La parola $parola non è un palindromo</p>";
        }

?>