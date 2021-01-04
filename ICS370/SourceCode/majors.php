<?php

include 'connection.php';
$conn = createConnection();

function getMajors($connection) {
    $sql = 'SELECT * FROM majors';
    $optionsData = '';
    foreach($connection->query($sql) as $row) {
        $majorName = strtolower(str_replace(' ', '-', $row['name']));
        $optionsData .= '<option id="' . $majorName . '" value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
    echo $optionsData;
    $conn = null;
}

function getMajorDataRaw($connection) {
    $sql = 'SELECT * FROM majors';
    $optionsData = '';
    foreach($connection->query($sql) as $row) {
        $optionsData .= $row['name'] . ', ';
    }
    echo $optionsData;
    $conn = null;
}

function sortMajorData($conn) {
    $goal = $_GET['data'];

    switch ($goal) {
        case 'raw':
            getMajorDataRaw($conn);
            break;

        case 'clean':
            getMajors($conn);
            break;


    }
}

sortMajorData($conn);