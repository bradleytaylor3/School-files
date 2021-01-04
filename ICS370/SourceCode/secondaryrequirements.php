<?php
include 'connection.php';
$conn = createConnection();

function getGoalCourses($connection, $req) {
    $sql = 'SELECT * FROM secondary_requirements_courses WHERE secondary_requirement_id = ' . $req;
    $courses = [];
    foreach ($connection->query($sql) as $row) {
        $courses[] = $row['courses_id'];
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

function sortGoalCourses($conn) {
    $goal = $_GET['goal'];
    switch ($goal) {
        case 1:
            getGoalCourses($conn, 1);
            break;

        case 3:
            getGoalCourses($conn, 7);
            break;

        case 4:
            getGoalCourses($conn, 9);
            break;

        case 5:
            getGoalCourses($conn, 10);
            break;

        case 6:
            getGoalCourses($conn, 12);
            break;

        case 7:
            getGoalCourses($conn, 13);
            break;

        case 8:
            getGoalCourses($conn, 14);
            break;

        case 9:
            getGoalCourses($conn, 15);
            break;

        case 10:
            getGoalCourses($conn, 16);
            break;

        case 'electives':
            getGoalCourses($conn, 17);
            break;

        case 'liberal-studies':
            getGoalCourses($conn, 18);
            break;

        case 'rigr':
            getGoalCourses($conn, 19);
            break;
    }
}

sortGoalCourses($conn);