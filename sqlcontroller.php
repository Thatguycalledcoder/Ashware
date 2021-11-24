<?php
    require "CRUD.php";

    //You can add more controllers for the functions created in CRUD.php

    //Insert function check
    function create($search_result) {
        $crud = new CRUD;
        $request = $crud->create($search_result);

        if($request) 
            return true;
        else
            return false;
    }

    //Select all function check and controller
    function readall() {
        $crud = new CRUD;   
        $request = $crud->read();

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

    //Select function check and control
    function read($id) {
        $crud = new CRUD;   
        $request = $crud->readone($id);

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
    function delete($id) {
        $crud = new CRUD;
        $request = $crud->delete($id);

        if($request) 
            return true;
        else
            return false;
    }

    
?>