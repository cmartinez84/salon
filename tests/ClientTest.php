<?php
// ./vendor/bin/phpunit tests
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=stylists_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown(){
            Client::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $id = 33;
            $name = "bob";
            $last_appointment = "11-14-2011";
            $next_appointment = "11-11-3011";
            $test_client= new Client($id, $name, $last_appointment, $next_appointment);
            //Act
            $result = $test_client->getName();
            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getId(){
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122");
            $test_client->save();


            $client_id = $test_client->getId();
            $result = is_numeric($client_id);
            // var_dump($test_client);
            $this->assertEquals(true, $result);
        }
        function test_save(){
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122");
            $test_client->save();

            $all_clients = Client::getAll();
            $result = $all_clients[0];
            // var_dump($test_client);

            $this->assertEquals($test_client, $result);
        }
    }
?>
