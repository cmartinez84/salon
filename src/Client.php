<?php
    Class Client
    {
        private $id;
        private $name;
        private $last_appointment;
        private $next_appointment;
        private $stylist_id;

        function __construct($id = null, $name, $last_appointment, $next_appointment, $stylist_id){
            $this->id = $id;
            $this->name = $name;
            $this->last_appointment = $last_appointment;
            $this->next_appointment = $next_appointment;
            $this->stylist_id = $stylist_id;
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
        function getNext_appointment(){
            return $this->next_appointment;
        }
        function setLast_appointment($last_appointment){
            $this->last_appointment = $new_last_appointment;
        }
        function getLast_appointment(){
            return $this->next_appointment;
        }
        function setNext_appointment($next_appointment){
            $this->next_appointment = $new_next_appointment;
        }
        function getStylistId()
        {
            return $this->stylist_id;
        }
        function setStylistId($new_stylist_id){
            $this->stylist_id = $new_stylist_id;
        }

        function save(){
            $GLOBALS['DB']->exec("INSERT INTO client (name, last_appointment, next_appointment, stylist_id) VALUES (
                '{$this->name}',
                '{$this->last_appointment}',
                '{$this->next_appointment}',
                '{$this->stylist_id}'
            );");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        function delete(){
            $GLOBALS['DB']->exec("DELETE FROM client where ID ={$this->getId()};");
        }
        function update($new_name, $last_appointment, $next_appointment){
            $GLOBALS['DB']->exec("UPDATE client SET
                name = '$new_name',
                last_appointment = '$last_appointment',
                next_appointment ='$next_appointment'
                WHERE id = {$this->getId()};");
                $this->setName($new_name);
        }

        static function getAll(){
            $returned_clients =$GLOBALS['DB']->query("SELECT * FROM client;");
            $all_clients = array();
            foreach ($returned_clients as $client) {
                $id = $client['id'];
                $name = $client['name'];
                $last_appointment = $client['last_appointment'];
                $next_appointment = $client['next_appointment'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($id, $name, $last_appointment, $next_appointment, $stylist_id);
                array_push($all_clients, $new_client);
            }
            return $all_clients;
        }
        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM client;");
        }
        static function find($search_id){

            $returned_clients = Client::getAll();
            foreach($returned_clients as $client){
                $client_id = $client->getId();
                if($search_id == $client_id){
                    $found_client = $client;
                }
            }
            return $found_client;
        }


    }

 ?>
