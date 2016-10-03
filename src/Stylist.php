<?php

    class Stylist
    {
        private $id;
        private $name;
        private $date_began;
        private $specialty;

        function __construct($id=null, $name, $date_began, $specialty="none"){
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
        function getDateBegan(){
            return $this->date_began;
        }
        function setDateBegan($new_date_began){
            $this->date_began = $new_date_began;
        }
        function getSpecialty(){
            return $this->specialty;
        }
        function setSpecialty($new_specialty){
            $this->specialty = $new_specialty;
        }
        function save(){
            $GLOBALS['DB']->exec("INSERT INTO stylists (name, date_began, specialty) VALUES (
                '{$this->name}',
                '{$this->date_began}',
                '{$this->specialty}'
            );");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        function delete(){
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id={$this->getid()};");
        }
        function getClients(){
            $all_clients = Client::getAll();
            $matched_clients = array();
            foreach($all_clients as $client){
                if($client->getStylistId() == $this->getId()){
                    array_push($matched_clients, $client);
                }
            }
            return $matched_clients;
        }

        static function find($search_id){

            $returned_stylists = Stylist::getAll();
            foreach($returned_stylists as $stylist){
                $stylist_id = $stylist->getId();
                if($stylist_id == $search_id){
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }
        static function getAll(){
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists");
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
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }
        function update($name, $date_began, $specialty){
            $GLOBALS['DB']->exec("UPDATE stylists SET
                name ='$name',
                date_began = '$date_began',
                specialty = '$specialty'
                WHERE id ='{$this->getId()}';");
        }
    }
?>
