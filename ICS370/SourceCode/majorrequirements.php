<?php
include 'connection.php';
$conn = createConnection();

function getMajorRequirements($connection) {
    $majorId = $_GET['major'];
    $sql = 'SELECT * FROM majors_courses WHERE major_id = ' . $majorId;
    $courses = [];
    foreach ($connection->query($sql) as $row) {
        $courses[] = $row['course_id'];
    }

    $courseInformation = [];
    $duplicateCheck = '';
    foreach ($courses as $course) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $course;
        foreach ($connection->query($sql) as $row) {
            if ($duplicateCheck == '') {
                $duplicateCheck = $row['id'];
                $courseInformation[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
            }

            if ($duplicateCheck !== $row['id']) {
                $courseInformation[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
                $duplicateCheck = $row['id'];
            }
        }
    }

    echo json_encode($courseInformation);
}

getMajorRequirements($conn);