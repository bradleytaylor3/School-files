<?php
include 'connection.php';
$connection = createConnection();

function downloadCSV($headers, $data, $filename) {
    $f = fopen('php://output', 'w');
    fputcsv($f, $headers, ',');

    foreach ($data as $datum) {
        fputcsv($f, $datum, ',');
    }


    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' .$filename.'";');
    fpassthru($f);
}

function getSearchParams($connection, $majorId) {
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

    $goals = [729, 730, 113, 62, 63, 64, 93, 14, 563, ];
    $goalCourses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $goalCourses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    foreach ($goalCourses as $course) {
        $courseInformation[] = [$course[0], $course[1], $course[2], $course[3]];
    }

    $majorName = '';
    $query = 'SELECT name FROM majors WHERE id = ' . $majorId;
    foreach ($connection->query($query) as $row) {
        $majorName = $row['name'];
    }

    downloadCSV(['id', 'Course', 'Description', 'Credits'], $courseInformation, $majorName . '.csv');
}

function presortAsyncRequest($conn) {
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $_SESSION['major'] = $_GET['major'];
    }

    getSearchParams($conn, $_SESSION['major']);
}

presortAsyncRequest($connection);