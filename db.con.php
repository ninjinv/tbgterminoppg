<?php

    $server = "localhost";
    $user = "root";
    $pw = "Test";
    $db = "mydb";

    $dbc = mysqli_connect($server, $user, $pw, $db);

    if(!$dbc) {
        echo "Connection failed!";        
    }
