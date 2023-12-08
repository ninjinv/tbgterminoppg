<?php

    $server = "localhost";
    $user = "root";
    $pw = "miau";
    $db = "mydb";

    $dbc = mysqli_connect($server, $user, $pw, $db);

    if(!$dbc) {
        echo "Connection failed!";        
    }
