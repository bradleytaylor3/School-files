<?php
include 'connection.php';
$conn = createConnection();

function getGoalOneRecommendations($connection) {
    $goals = [729, 730, 113];
    $courses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courses);
}

function getGoalThreeRecommendations($connection) {
    $goals = [62, 63, 64];
    $courses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courses);
}

function getGoalRigr($connection) {
    $sql = 'SELECT * FROM courses WHERE id = 113';
    $courses = [];
    foreach ($connection->query($sql) as $row) {
        $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
    }

    echo json_encode($courses);
}

function getGoalFourRecommendations($connection) {
    $sql = 'SELECT * FROM secondary_requirements_courses WHERE secondary_requirement_id = 9';
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

function getGoalFiveRecommendations($connection) {
    $goals = [93, 14];
    $courses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courses);
}

function getGoalSixRecommendations($connection) {
    $sql = 'SELECT * FROM secondary_requirements_courses WHERE secondary_requirement_id = 12';
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

function getGoalSevenRecommendations($connection) {
    $goals = [113];
    $courses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courses);
}

function getGoalEightRecommendations($connection) {
    $goals = [14];
    $courses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courses);
}

function getGoalNineRecommendations($connection) {
    $goals = [563];
    $courses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courses);
}

function getGoalTenRecommendations($connection) {
    $goals = [64];
    $courses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courses);
}

function getLiberalStudies($connection) {
    $goals = [14, 93];
    $courses = [];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courses[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courses);
}

function getElectives($connection) {
    $sql = 'SELECT * FROM secondary_requirements_courses WHERE secondary_requirement_id = 17';
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

function populateRecommendedCourses($connection) {
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

    $goals = [14, 93, 729, 730, 113, 62, 63, 64, 563];
    foreach ($goals as $goal) {
        $sql = 'SELECT * FROM courses WHERE id = ' . $goal;
        foreach ($connection->query($sql) as $row) {
            $courseInformation[] = [$row['id'], $row['name'], $row['description'], $row['credits']];
        }
    }

    echo json_encode($courseInformation);
}

function getMajorName($connection) {
    $majorId = $_GET['major'];
    $sql = 'SELECT * FROM majors WHERE id = ' . $majorId;
    $major = [];
    foreach ($connection->query($sql) as $row) {
        $major[] = [$row['id'], $row['name']];
    }

    echo json_encode($major);
}

function sortGoalCourses($conn) {
    $goal = $_GET['goal'];

    switch ($goal) {
        case 1:
            getGoalOneRecommendations($conn);
            break;

        case 3:
            getGoalThreeRecommendations($conn);
            break;

        case 4:
            getGoalFourRecommendations($conn);
            break;

        case 5:
            getGoalFiveRecommendations($conn);
            break;

        case 6:
            getGoalSixRecommendations($conn);
            break;

        case 7:
            getGoalSevenRecommendations($conn);
            break;

        case 8:
            getGoalEightRecommendations($conn);
            break;

        case 9:
            getGoalNineRecommendations($conn);
            break;

        case 10:
            getGoalTenRecommendations($conn);
            break;

        case 'electives':
            getElectives($conn);
            break;

        case 'liberal-studies':
            getLiberalStudies($conn);
            break;

        case 'rigr':
            getGoalRigr($conn);
            break;

        case 'major':
            getMajorRequirements($conn);
            break;

        case 'recommended':
            populateRecommendedCourses($conn);
            break;

        case 'major_name':
            getMajorName($conn);
            break;
    }
}

sortGoalCourses($conn);