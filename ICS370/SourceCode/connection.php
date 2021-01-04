<?php

function createConnection() {
    $host="localhost";
    $user="merp";
    $password="alpha12Tango";
    $db = ["graduation efficiency planner"];

    try {
        $conn = new PDO("mysql:host=$host;dbname=graduation efficiency planner", $user, $password, $db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed with error: " . $e->getMessage();
    }

    return $conn;
}