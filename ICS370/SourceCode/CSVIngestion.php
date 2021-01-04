<?php

include 'connection.php';
$connection = createConnection();

function parseCSVUpload() {
    $csv = array();
    $finishedCourses = [];


// check there are no errors
    if($_FILES['file']['error'] == 0){
        $name = $_FILES['file']['name'];
        $ext = explode('.', $name)[1];
        $type = $_FILES['file']['type'];
        $tmpName = $_FILES['file']['tmp_name'];
        // check the file is a csv
        if($ext === 'csv'){

            if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                // necessary if a large csv file
                set_time_limit(0);

                $row = 0;
                while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {;
                    if ($row != 0) {
                        $finishedCourses[] = [$data[1], $data[2], $data[3]];
                    } else {
                        $row++;
                    }
                }
                fclose($handle);
            }
        }
    }
    echo json_encode($finishedCourses);
}

parseCSVUpload();