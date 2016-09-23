<?php
// ./vendor/bin/phpunit tests
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";


    $server = 'mysql:host=localhost:8889;dbname=stylists_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown(){
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $id = 33;
            $name = "Sally";
            $date_began = "11-11-2011";
            $specialty = "Specialty";
            $test_stylist = new Stylist($id, $name, $date_began, $test_stylist);
            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }
        function test_getId(){

            $name = "Sally";
            $date_began = "11-11-2011";
            $specialty = "Specialty";
            $test_stylist = new Stylist($id, $name, $date_began, $test_stylist);
            $test_stylist->save();
            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }
        function test_save(){

            $name = "Sally";
            $date_began = "11-11-2011";
            $specialty = "Specialty";
            $test_stylist = new Stylist($id, $name, $date_began, $test_stylist);
            $test_stylist->save();
            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }
        function test_findStylist(){
            $test_stylist1 = new Stylist (null, "alexandra", "11-11-2011", "children");
            $test_stylist1->save();

            $test_stylist2 = new Stylist (null, "bob", "11-22-3333", "burgers");
            $test_stylist2->save();
            $search_id = $test_stylist1->getId();

            $result = Stylist::find($search_id);

            $this->assertEquals($test_stylist1, $result);
        }
        function test_findStylist_false(){
            $test_stylist1 = new Stylist (null, "alexandra", "11-11-2011", "children");
            $test_stylist1->save();

            $test_stylist2 = new Stylist (null, "bob", "11-22-3333", "burgers");
            $test_stylist2->save();
            $search_id = $test_stylist2->getId();

            if(Stylist::find($search_id) != $test_stylist1){
                $result = false;
            }

            $this->assertEquals(false, $result);
        }
        function test_getClients(){
            $test_stylist1 = new Stylist(333, "alexandra", "11-11-2011", "children");
            $test_stylist1->save();
            $test_stylist2 = new Stylist(null, "bob", "11-22-3333", "burgers");
            $test_stylist2->save();
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122", 333);
            $test_client->save();

            $found_clients = Stylist::getClients(333);
            $result = $found_clients[0];

            $this->assertEquals($test_client, $result);
        }
        function test_delete(){
            $test_stylist1 = new Stylist(null, "alexandra", "11-11-2011", "children");
            $test_stylist1->save();
            $test_stylist2 = new Stylist(null, "bob", "11-22-3333", "burgers");
            $test_stylist2->save();

            $test_stylist1->delete();
            $result = Stylist::getAll();

            $this->assertEquals([$test_stylist2], $result);
        }
    }
?>
