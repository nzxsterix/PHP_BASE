<?php

    // Credenziali
    $username = "step";
    $password = "123";

    // Controlla se i dati sono stati inviati
    if ( isset( $_POST["username"] ) && isset( $_POST['password'] ) ) {

        // Recupera i dati dal form
        $user = $_POST["username"];
        $pass = $_POST["password"];

        // Verifica le credenziali
        if ( $user == $username && $pass == $password ) {
            echo "<p>Accesso riuscito, ciao $user</p>";
        } else {
            echo "<p>Credenziali sbagliate.</p>";
        }

    }

?>