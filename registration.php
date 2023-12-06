<?php

include 'db.con.php';

?>

<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title>PHP registrering</title>

    </head>
    <body>
    <nav>
        <ul>
        <li><a href="tbg.php">Play</a></li>
        <li class="dropdown">
            <a href="welcome.php">Profile</a>
            <ul class="dropdown-content">
            <li><a href="welcome.php">Profile</a></li>
            <li><a href="account.php">Account settings</a></li>
            <li><a href="logout.php">Log out</a></li>
            </ul>
        </li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    
        <p>Opprett ny bruker:</p>
        <form id="formL" method="post">
            <label class="inputL" for="navn">Kallenavn:</label>
            <input type="text" name="navn" placeholder="kallenavn" value="<?php
    if (empty($_POST['navn'])){
      $_POST['navn'] = '';
      } else {
        echo htmlentities($_POST['navn']);
        };
        ?>" required /><br />
            <label class="inputL" for="brukernavn">Brukernavn:</label>
            <input type="text" name="brukernavn" placeholder="brukernavn" value="<?php
    if (empty($_POST['brukernavn'])){
      $_POST['brukernavn'] = '';
      } else {
        echo htmlentities($_POST['brukernavn']);
        };
        ?>" required /><br />
            <label class="inputL" for="passord">Passord:</label>
            <input type="password" name="passord" placeholder="passord" value="<?php
    if (empty($_POST['passord'])){
      $_POST['passord'] = '';
      } else {
        echo htmlentities($_POST['passord']);
        };
        ?>" required /><br />
            <label class="inputL" for="email">Email:</label>
            <input type="email" name="email" placeholder="email" value="<?php
    if (empty($_POST['email'])){
      $_POST['email'] = '';
      } else {
        echo htmlentities($_POST['email']);
        };
        ?>" required /><br />
            <input class="button" type="submit" value="Registrer her" name="submit" />
            <label class="inputL" name="allDone"></label>
            
        </form>    
        <script src="script.js"></script>
    </body>
    <?php


        if(isset($_POST['submit'])){
            //Gjøre om POST-data til variabler
            $navn = $_POST['navn'];
            $brukernavn = $_POST['brukernavn'];
            $passord = (hash("sha512", $_POST['passord']));
            $email = $_POST['email'];

            $dupusername = "SELECT username FROM users WHERE username = '$brukernavn'";
            $result_dupusername = mysqli_query($dbc, $dupusername) or die('Error querying database.');
          
            $count = mysqli_num_rows($result_dupusername);

            

            if( strlen($_POST['passord']) < 8 ) {
                echo "Passord for kort! Lag et passord med 8 karakterer eller mer!
                ";
                
                } else {

            if ($count > 0) {
                echo "<p>Brukernavn er tatt. Skriv inn et annet brukernavn.</p>";
            } else {
            //Gjøre klar SQL-strengen
            $query = "INSERT INTO users (navn, username, password, email) VALUES ('$navn', '$brukernavn','$passord', '$email')";


            
            //Utføre spørringen
            $result = mysqli_query($dbc, $query) 
              or die('Error querying database.');

            //Sjekke om spørringen gir resultater
            if($result){
                    //Gyldig login
                echo "Takk for at du lagde bruker! Trykk <a href='index.php'>her</a> for å logge inn";
                } else {
                    // Progress insertion failed
                    echo "Registrering fullført, men det har skjedd en feil med å sette deg inn som en spiller.";
                }
            }
        }
    }
            //Koble fra databasen
            mysqli_close($dbc);
        
        
    ?>
    
</html>