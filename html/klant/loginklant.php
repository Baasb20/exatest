<?php

    session_start();
    include '../database/DB.php';
    
    // hier wordt gekeken als er in fields iets niet klopt dan geeft het een error.
    if(isset($_POST['submit'])){

        // naam attributes
        $fields = ['gebruikersnaam', 'wachtwoord'];

        $error = false;


        foreach($fields as $field){
            // als een field niet klopt dan wordt de error true.
            if(!isset($_POST[$field]) || empty($_POST[$field])){
                $error = true;
            }
        }
        // alles er geen error zijn kan je inloggen.
        if(!$error){
            $gebruikersnaam= $_POST['gebruikersnaam'];
            $wachtwoord= $_POST['wachtwoord'];
            
            // connectie met de database.
            $db = new database();
            
            // functie loginMedewerker wordt aangeroepen.
            $db->loginKlant($gebruikersnaam, $wachtwoord);
        }
    }     

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login voor klant</h1>
    <form method="post" action="loginklant.php">
        <input type="text" name="gebruikersnaam" placeholder="Vul in uw gebruikersnaam" required><br>
        <input type="password" name="wachtwoord" placeholder="Vul in uw wachtwoord"required><br>
        <input type="submit" name="submit" value="submit"><br>
    </form>
    <button>
        <a href="../index.php">Terug</a>
    </button>
</body>
</html>