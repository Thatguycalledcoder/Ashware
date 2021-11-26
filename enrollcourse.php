<?php
    include "sqlcontroller.php";

    if (isset($_POST["course_id"])) {
        $course_id = $_POST["course_id"];
        $student_id = $_POST["student_id"];
        $result = validateEnrollment($student_id, $course_id);
        if ($result == null) {
            $status2 = enroll($student_id, $course_id);
            if($status2) 
                echo "true";
            else 
                echo "false";
        }
        else
            echo "maybe";
    }  
    else {
        echo "false";
    }

?>