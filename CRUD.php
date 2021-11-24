<?php
    require "database_connection.php";

    //You can add new functions and change the value of TABLE, COLUMN to fit our database

    class CRUD extends Database{ 
        
        //Insert SQL function
        function create($value) {
            $sql = $sql = "INSERT INTO TABLE(COLUMN)
            VALUES ('$value')";
            return $this->run_query($sql);
        }

        //Select all SQL function for all rows of data in a table
        function read() {
            $sql = "SELECT * FROM TABLE";   
            return $this->run_query($sql);   
        }

        //Select SQL function for one row of data
        function readone($id) {
            $sql = "SELECT * FROM TABLE WHERE COLUMN = '$id'";  
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