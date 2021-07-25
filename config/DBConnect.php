<?php

    $host = 'localhost';
    $db_name = 'sinavsistemi';
    $username = 'root';
    $password = '';
    $charset = 'utf8';

    try {
        $db = new PDO("mysql:host=$host;dbname=$db_name;charset=$charset", $username, $password);
    } catch (PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
    }
?>