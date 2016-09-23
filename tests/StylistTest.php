<?php
// ./vendor/bin/phpunit tests
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    // $server = 'mysql:host=localhost:8889;dbname=stylist';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);
    //

    class StylistTest extends PHPUnit_Framework_TestCase
    {

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
    }
?>
