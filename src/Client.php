<?php
    Class Client
    {
        private $id;
        private $name;
        private $last_appointment;
        private $next_appointment;

        function __construct($id = null, $name, $last_appointment, $next_appointment){
            $this->id = $id;
            $this->name = $name;
            $this->last_appointment = $last_appointment;
            $this->next_appointment = $next_appointment;
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
        function getNext(){
            return $this->name;
        }
        function setNext($new_name){
            $this->name = $new_name;
        }

        function save(){
            $GLOBALS['DB']->exec("INSERT INTO client (name, last_appointment, next_appointment) VALUES ('{$this->name}',
                '{$this->last_appointment}',
                '{$this->next_appointment}'
            );");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        static function getAll(){
            $returned_clients =$GLOBALS['DB']->query("SELECT * FROM client;");
            $all_clients = array();
            foreach ($returned_clients as $client) {
                $id = $client['id'];
                $name = $client['name'];
                $last_appointment = $client['last_appointment'];
                $next_appointment = $client['next_appointment'];
                $new_client = new Client($id, $name, $last_appointment, $next_appointment);
                array_push($all_clients, $new_client);
            }
            return $all_clients;
        }
        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM client;");
        }
    }

 ?>
