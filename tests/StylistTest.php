<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";


    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown(){
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function testGetName()
        {
            //Arrange
            $test_id = 33;
            $test_name = "Sally";
            $test_date_began = "11-11-2011";
            $test_specialty = "Specialty";
            $test_stylist = new Stylist($test_id, $test_name, $test_date_began, $test_stylist);
            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($test_name, $result);
        }
        function testGetId(){

            $test_name = "Sally";
            $test_date_began = "11-11-2011";
            $test_specialty = "Specialty";
            $test_stylist = new Stylist($id, $test_name, $test_date_began, $test_test_stylist);
            $test_stylist->save();
            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }
        function testSave(){

            $test_name = "Sally";
            $test_date_began = "11-11-2011";
            $test_specialty = "Specialty";
            $test_stylist = new Stylist($id, $test_name, $test_date_began, $test_stylist);
            $test_stylist->save();
            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }
        function testFindStylist(){
            $test_stylist1 = new Stylist (null, "alexandra", "11-11-2011", "children");
            $test_stylist1->save();

            $test_stylist2 = new Stylist (null, "bob", "11-22-3333", "burgers");
            $test_stylist2->save();
            $test_search_id = $test_stylist1->getId();

            $result = Stylist::find($test_search_id);

            $this->assertEquals($test_stylist1, $result);
        }
        function testFindStylistFalse(){
            $test_stylist1 = new Stylist (null, "alexandra", "11-11-2011", "children");
            $test_stylist1->save();

            $test_stylist2 = new Stylist (null, "bob", "11-22-3333", "burgers");
            $test_stylist2->save();
            $test_search_id = $test_stylist2->getId();

            if(Stylist::find($test_search_id) != $test_stylist1){
                $result = false;
            }

            $this->assertEquals(false, $result);
        }
        function testGetClients(){
            $test_stylist1 = new Stylist(333, "alexandra", "11-11-2011", "children");
            $test_stylist1->save();
            $test_stylist2 = new Stylist(null, "bob", "11-22-3333", "burgers");
            $test_stylist2->save();
            $test_client = new Client(null, "bob", "1-11-2111", "2-22-2122", 333);
            $test_client->save();

            $test_found_clients = $test_stylist1->getClients(333);
            $result = $test_found_clients[0];

            $this->assertEquals($test_client, $result);
        }
        function testDelete(){
            $test_stylist1 = new Stylist(null, "alexandra", "11-11-2011", "children");
            $test_stylist1->save();
            $test_stylist2 = new Stylist(null, "bob", "11-22-3333", "burgers");
            $test_stylist2->save();

            $test_stylist1->delete();
            $result = Stylist::getAll();

            $this->assertEquals([$test_stylist2], $result);
        }
        function testUpdate(){
            $test_stylist = new Stylist(null, "alexandra", "11-11-2011", "children");
            $test_stylist->save();
            $test_stylist_id = $test_stylist->getId();
            $test_name = "new";

            $test_stylist->update($test_name, "stuff", "here");
            $found_test_stylist = Stylist::find($test_stylist_id);
            $result = $found_test_stylist->getName();


            $this->assertEquals("new", $result);
        }
    }
?>
