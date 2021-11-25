<?php
    include "sqlcontroller.php";

    if (isset($_POST["course_id"])) {
        $course_id = $_POST["course_id"];
        $student_id = $_POST["student_id"];
        $status = enroll($student_id, $course_id);
        if($status) 
            echo "true";
        else 
            echo "false";
    }
    else {
        echo "false";
    }

?>