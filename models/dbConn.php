<?php
$dsn = "mysql:host=localhost;dbname=bubbalyrics";
$username = "bubbalyrics";
$password = "password";
try {
    $db = new PDO($dsn, $username, $password);
    //echo "Connected!";
} catch (PDOException $e) {
    /* This code will potentially give away too mmch information.
    $error_message = $e->getMessage();
    echo $error_message;*/
    exit("<br />Error connecting to the database");
}
?>