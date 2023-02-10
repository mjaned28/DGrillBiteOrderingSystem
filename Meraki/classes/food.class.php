<?php

    include_once 'database.php';

    class Food{
        protected $db;

        function __construct(){
            $this->db = new Database;
        }

        function fetch(){
            $sql = 'SELECT * FROM food';

            $query = $this->db->connect()->prepare($sql);
            
            if($query->execute()){
                $data = $query->fetchall();
            }

            return $data;
        }
    }

?>