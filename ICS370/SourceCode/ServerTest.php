<?php
$host="localhost";
$user="merp";
$password="alpha12Tango";
$db = ["graduation efficiency planner"];

try {
    $conn = new PDO("mysql:host=$host;dbname=graduation efficiency planner", $user, $password, $db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected";
} catch (PDOException $e) {
    echo "Connection failed with error: " . $e->getMessage();
}

$sql = "SELECT * FROM majors";
foreach ($conn->query($sql) as $row) {
//    print $row['id'] . '\n';
    print strtolower(str_replace(' ', '-', $row['name']));
}

