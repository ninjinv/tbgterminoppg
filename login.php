<?php
include 'db.con.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sjekk pålogging</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            //Gjøre om POST-data til variabler
            $brukernavn = $_POST['brukernavn'];
            $passord = (hash("sha512", $_POST['passord']));
            
            //Koble til databasen
            
            
            //Gjøre klar SQL-strengen
            $query = "SELECT username, password from users where username='$brukernavn' and password='$passord'";
            // "INSERT INTO users VALUES ('$brukernavn', 'passord')";

            //Utføre spørringen
            $result = mysqli_query($dbc, $query)
              or die('Error querying database.');
            
            //Koble fra databasen
            mysqli_close($dbc);

            //Sjekke om spørringen gir resultater
            if($result->num_rows > 0){
                // Start a session
                session_start();
                // Store user information in the session
                $_SESSION['username'] = $brukernavn;
                // Redirect to a welcome page or dashboard
                header('location: welcome.php');
            } else {
                // Invalid login
                header('location: index.php');
                echo "invalid password or username, try again.";
            }

        }
    ?>
</body>
</html>