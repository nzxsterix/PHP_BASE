<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubrica Contatti</title>
</head>
<body>

    <h1>Rubrica Contatti</h1>

    <h2>Aggiungi Contatto</h2>

    <!-- form dove chiedo nome e telefono --> 
    <form action="" method="POST">
        
        Nome : <input type="text" name="name" required><br><br>

        Telefono : <input type="text" name="phone" required><br><br>

        <button type="submit" name="add">Aggiungi</button>

    </form>
    <!-- form dove faccio ricerca del contatto--> 
    <h2>Ricerca Contatto</h2>
        <form action="" method="POST">
            
            Nome : <input type="text" name="search_name"><br><br>

            <button type="submit" name="search">Cerca</button>
    
</body>
</html>