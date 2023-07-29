<?php

    $dbHost = "localhost";
    $dbUser = "YOUR-USER-NAME";
    $dbPass = "YOUR-DATABSE-PASS";
    $dbName = "DATABSE-NAME";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Database Connection Failed!");
    }

?>