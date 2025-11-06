<?php

$username = "step";
$password = "123";

if ( isset( $_POST["username"] ) && isset( $_POST['password'] ) ) {

    $user = $_POST["username"];
    $pass = $_POST["password"];

    if ( $user == $username && $pass == $password ) {
        echo "<p>Accesso riuscito, ciao $user</p>";
    } else {
        echo "<p>Credenziali sbagliate.</p>";
    }

}

?>