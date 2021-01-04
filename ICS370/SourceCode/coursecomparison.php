<?php
include 'connection.php';
$conn = createConnection();

function getCoursesAndGoalIds($connection) {
    $sql = 'SELECT * FROM secondary_requirements_courses';
    $duplicateCheck = 0;
    $coursesReqs = [];
    $courseInformation = [];
    foreach ($connection->query($sql) as $row) {
        if ($duplicateCheck == 0 || $duplicateCheck == $row['courses_id']  ) {
            $duplicateCheck = $row['courses_id'];
            $courseInformation[] = $row['secondary_requirement_id'];
            var_dump($courseInformation);
        }

        if ($duplicateCheck !== $row['courses_id']) {
            $coursesReqs[$duplicateCheck] = $courseInformation;
            $courseInformation = [];
            $courseInformation[] = $row['secondary_requirement_id'];
            $duplicateCheck = $row['courses_id'];
        }
    }

//    echo json_encode($coursesReqs);
}

getCoursesAndGoalIds($conn);