<?php

    class Stylist
    {
        private $id;
        private $name;
        private $date_began;
        private $specialty;

        function __construct($id=null, $name, $date_began, $specialty ="none"){
            $this->id = $id;
            $this->name = $name;
            $this->date_began = $date_began;
            $this->specialty = $specialty;
        }
        function getId(){
            return $this->id;
        }
        function getName(){
            return $this->name;
        }
        function setName($new_name){
            $this->name = $new_name;
        }
        function getDate_began(){
            return $this->date_began;
        }
        function setDate_began($new_date_began){
            $this->date_began = $new_date_began;
        }
        function getSpecialty(){
            return $this->specialty;
        }
        function setSpecialty($new_specialty){
            $this->specialty = $new_specialty;
        }
        function save(){
            $GLOBALS['DB']->exec("INSERT INTO stylist (name, date_began, specialty) VALUES (
                '{$this->name}',
                '{$this->date_began}',
                '{$this->specialty}'
            );");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        // function getClients(){
        //
        // }
        // static function deleteAll(){
        //
        // }
        static function getAll(){
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist");
            $stylists= array();
            foreach ($returned_stylists as $stylist) {
                $id = $stylist['id'];
                $name = $stylist['name'];
                $date_began = $stylist['date_began'];
                $specialty = $stylist['specialty'];
                $new_stylist = new Stylist($id, $name, $date_began, $specialty);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }
        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM stylist;");
        }
    }
 ?>
