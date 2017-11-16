<?php

use PHPUnit\Framework\TestCase;

class InformationGatewayTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/InformationGateway.php';
    }

    public function test() {
        require 'config/config.php';

        $connection = new Connection($base, $login, $password);

        try {
            $connection->executeQuery("DELETE from Information WHERE statut = '__TEST__PHP__UNIT__';");
        } catch (Exception $ex) { }
        
        $connection->executeQuery("SELECT COUNT(*) FROM Information");
        $nbrResult = $connection->getResults()[0];
        $connection->executeQuery("INSERT INTO `Information` (status, name, firstname, photo, age, address, phone, mail)"
                . " VALUES ('__TEST__PHP__UNIT__', 'a', 'b', 'c', 'd', 'e', 'f', 'g');");

        $gw = new InformationGateway(new Connection($base, $login, $password));
        $result = $gw->getAllInformation();
        $connection->executeQuery("DELETE from Information WHERE status = '__TEST__PHP__UNIT__';");
        
        $this->assertEquals(18, count($result[0]));
        
        $nbr = $nbrResult[0];
        
        $this->assertTrue(isset($result[$nbr]["ID"]));
        $this->assertTrue(isset($result[$nbr]["status"]));
        $this->assertTrue(isset($result[$nbr]["name"]));
        $this->assertTrue(isset($result[$nbr]["firstName"]));
        $this->assertTrue(isset($result[$nbr]["photo"]));
        $this->assertTrue(isset($result[$nbr]["age"]));
        $this->assertTrue(isset($result[$nbr]["address"]));
        $this->assertTrue(isset($result[$nbr]["phone"]));
        $this->assertTrue(isset($result[$nbr]["mail"]));
    }
}
