<?php

use PHPUnit\Framework\TestCase;

class EducationGatewayTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/EducationGateway.php';
    }

    public function test() {
        require 'config/config.php';

        $connection = new Connection($base, $login, $password);

        try {
            $connection->executeQuery("DELETE from Education WHERE education = '__TEST__PHP__UNIT__';");
        } catch (Exception $ex) { }
        
        $connection->executeQuery("SELECT COUNT(*) FROM Education");
        $nbrResult = $connection->getResults()[0];
        $connection->executeQuery("INSERT INTO `Education` (date, education)"
                . " VALUES ('2000-01-01' ,'__TEST__PHP__UNIT__');");

        $gw = new EducationGateway(new Connection($base, $login, $password));
        $result = $gw->getAllEducation();
        $connection->executeQuery("DELETE from Education WHERE education = '__TEST__PHP__UNIT__';");
        
        $this->assertEquals(6, count($result[0]));
        
        $nbr = $nbrResult[0];
        
        $this->assertTrue(isset($result[$nbr]["ID"]));
        $this->assertTrue(isset($result[$nbr]["date"]));
        $this->assertTrue(isset($result[$nbr]["education"]));
    }
}
