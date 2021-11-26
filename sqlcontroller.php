<?php
    require "CRUD.php";

    //You can add more controllers for the functions created in CRUD.php
    function validateLogin($email, $password) {
        $crud = new CRUD;
        $request = $crud->validateLogin($email, $password);

        if($request){
            $record = $crud->fetch();
            if(!empty($record)){
                return $record;
            }else{
                return [];
            }
        }else{
            return false;
        }

    }
    //Enrollment of courses function 
    function enroll($student_id, $course_id) {
        $crud = new CRUD;
        $request = $crud->addEnrollment($student_id, $course_id);

        if($request) 
            return true;
        else
            return false;
    }

    function getLessonCourses($course_id) {
        $crud = new CRUD;   
        $request = $crud->Courselessons($course_id);

        if($request){
            $posts = array();
            while($record = $crud->fetch()){
                $posts[] = $record;
            }
            return $posts;
        }else{
            return false;
        }
    }

    //Select all function check and controller
    function getEnrollments($student_id) {
        $crud = new CRUD;   
        $request = $crud->getEnrollments($student_id);

        if($request){
            $posts = array();
            while($record = $crud->fetch()){
                $posts[] = $record;
            }
            return $posts;
        }else{
            return false;
        }
    }

    function getCourses() {
        $crud = new CRUD;   
        $request = $crud->getCourses();

        if($request){
            $posts = array();
            while($record = $crud->fetch()){
                $posts[] = $record;
            }
            return $posts;
        }else{
            return false;
        }

    }

    //Get number of lessons for a course
    function getLessons($course_id) {
        $crud = new CRUD;   
        $request = $crud->Lessons($course_id);

        if($request) {
            $result = $crud->fetch();
            return $result;
        }
        else
            return false;
    }

    function validateEnrollment($student_id, $course_id) {
        $crud = new CRUD;   
        $request = $crud->checkEnrollment($student_id, $course_id);

        if($request) {
            $result = $crud->fetch();
            return $result;
        }
        else
            return false;
    }

    //Update function check
    function update($id, $search_result) {
        $crud = new CRUD;
        $request = $crud->update($id, $search_result);

        if($request) 
            return true;
        else
            return false;
    }

    //Delele function check
    function Unenroll($student_id, $course_id) {
        $crud = new CRUD;
        $request = $crud->delete($student_id, $course_id);

        if($request) 
            return true;
        else
            return false;
    }

    
?>