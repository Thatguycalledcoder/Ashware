<?php
    include "sqlcontroller.php";

    if (isset($_POST["course_id"])) {
        $course_id = $_POST["course_id"];
        $student_id = $_POST["student_id"];
        $result = Unenroll($student_id, $course_id);
    }  
    else {
        echo "false";
    }

?>