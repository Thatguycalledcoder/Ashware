<?php
    include "database_credentials.php";

    class Database {
        public $database;
        public $result;

        function db_connect() {
            //Connect to database
            $this->database = mysqli_connect(null, username, password, database, null, instance);

            //Check if connection is successful
            if(mysqli_connect_errno()) 
                return false;
            else 
                return true;

        }

        //Run SQL query
        function run_query($query) {
            if(!$this->db_connect() || $this->database == null)
                return false;

            $this->result = mysqli_query($this->database, $query);
            if($this->result == false)
                return false;
            else
                return true;
        }

        //Get results
        function fetch() {
            if($this->result == null)
                return false;

            return mysqli_fetch_assoc($this->result);
        }
    }
?>