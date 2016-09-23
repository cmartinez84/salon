<?php
// ./vendor/bin/phpunit tests
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=stylists_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function teardown(){
            Stylist::deleteAll();
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
    }
?>
