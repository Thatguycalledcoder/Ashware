<?php
    require "database_connection.php";

    //You can add new functions and change the value of TABLE, COLUMN to fit our database

    class CRUD extends Database{ 
        
        function validateLogin($email, $password) {
            $sql = "SELECT * 
                    FROM Students 
                    WHERE Email='$email' AND Studentpassword='$password'";
            return $this->run_query($sql);
        }

        //Insert SQL function
        function addEnrollment($student_id, $course_id) {
            $sql = "INSERT INTO Enrollments(Student_id, Course_id)
                    VALUES ('$student_id','$course_id')";
            return $this->run_query($sql);
        }

        //Select all SQL function for all rows of data in a table
        function getEnrollments($student_id) {
            $sql = "SELECT c.Course_id, c.Course_name, c.Course_desc, c.Course_image, l.Fname, l.Lname
                    FROM Courses c, Lecturers l
                    INNER JOIN Enrollments e
                    WHERE c.Course_lecturer = l.Lecturer_id AND c.Course_id = e.Course_id AND e.Student_id = '$student_id';";   
            return $this->run_query($sql);   
        }

        //Select SQL function for one row of data
        function getCredentials($email, $password) {
            $sql = "SELECT * 
                    FROM Students 
                    WHERE Email = '$email' AND Studentpassword = '$password'";  
            return $this->run_query($sql);   
        }

        function getCourses() {
            $sql = "SELECT c.Course_id ,c.Course_name, c.Course_desc, c.Course_image, l.Fname, l.Lname
            FROM Courses c
            INNER JOIN Lecturers l
            WHERE c.Course_lecturer = l.Lecturer_id";  
            return $this->run_query($sql);   
        }

        function Lessons($course_id) {
            $sql = "SELECT COUNT(Lesson_id)
                    FROM Lessons
                    WHERE Course_id = 1"; 
            return $this->run_query($sql);          
        }

        //Update SQL function
        function update($id, $value) {
            $sql = "UPDATE TABLE SET COLUMN = '$value' WHERE COLUMN = '$id'";
            return $this->run_query($sql);
        }

        //Delete SQL function
        function delete($id) {
            $sql = "DELETE FROM TABLE WHERE COLUMN = '$id'";
            return $this->run_query($sql);
        }

    }

?>