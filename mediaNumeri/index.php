<!DOCTYPE   html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Numeri</title>
</head>
<body>

    <h1>Media Numeri</h1>

    <form action="index.php" method="post">
        <label for="num1">Numero 1:</label>
        <input type="number" name="num1" required><br>

        <label for="num2">Numero 2:</label>
        <input type="number" name="num2" required><br>

        <label for="num3">Numero 3:</label>
        <input type="number" name="num3" required><br>

        <label for="num4">Numero 4:</label>
        <input type="number" name="num4" required><br>

        <label for="num5">Numero 5:</label>
        <input type="number" name="num5" required><br>

        <input type="submit" value="Calcola Media">

    </form>

    <?php
        if ( isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['num3']) && isset($_POST['num4']) && isset($_POST['num5']) ) {

            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $num3 = $_POST['num3'];
            $num4 = $_POST['num4'];
            $num5 = $_POST['num5'];

            $somma = $num1 + $num2 + $num3 + $num4 + $num5;
            $media = $somma / 5;

            echo "<p>La media è: $media</p>";
        }
    ?>


    
</body>
</html>
