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
            $stylist_id = 10;
            $test_client= new Client($id, $name, $last_appointment, $next_appointment, 10);
            //Act
            $result = $test_client->getName();
            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getId(){
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122", 10);
            $test_client->save();


            $client_id = $test_client->getId();
            $result = is_numeric($client_id);
            // var_dump($test_client);
            $this->assertEquals(true, $result);
        }
        function test_save(){
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122", 10);
            $test_client->save();

            $all_clients = Client::getAll();
            $result = $all_clients[0];
            // var_dump($test_client);

            $this->assertEquals($test_client, $result);
        }
        function test_find(){
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122", 10);
            $test_client2 = new Client(null, "bob", "1-11-2111", "2-22-2122", 10);
            $test_client->save();
            $test_client2->save();
            $search_id = $test_client2->getId();

            $result = Client::find($search_id);

            $this->assertEquals($test_client2, $result);

        }
        function test_delete(){
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122", 10);
            $test_client2 = new Client(null, "bob", "1-11-2111", "2-22-2122", 10);
            $test_client->save();
            $test_client2->save();

            $test_client->delete();
            $result = Client::getAll();

            $this->assertEquals([$test_client2], $result);

        }
        function test_update(){
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122", 10);
            $test_client->save();
            $test_client_id = $test_client->getId();
            $new_name = "barbara";
            $new_last_apppointment = "5-5-55";
            $new_next_appointment = "9-9-99";

            $test_client->update($new_name, $new_last_apppointment,  $new_next_appointment);
            $altered_client = Client::find($test_client_id);
            $altered_name = $altered_client->getName();

            $this->assertEquals($new_name, $altered_name);
        }
    }
?>
