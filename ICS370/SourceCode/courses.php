<?php

include 'connection.php';
$conn = createConnection();

function getCourses($connection) {
    $sql = 'SELECT * FROM courses';
    $optionsData = '';
    foreach($connection->query($sql) as $row) {
        echo $row['name'];
    }

    $conn = null;
}

$parameter = $_SERVER['QUERY_STRING'];
echo $parameter;
//getCourses($conn);