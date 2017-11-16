<?php

use PHPUnit\Framework\TestCase;

class DiverseGatewayTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/DiverseGateway.php';
    }

    public function test() {
        require 'config/config.php';

        $connection = new Connection($base, $login, $password);

        try {
            $connection->executeQuery("DELETE from Diverse WHERE diverse = '__TEST__PHP__UNIT__';");
        } catch (Exception $ex) { }
        
        $connection->executeQuery("SELECT COUNT(*) FROM Diverse");
        $nbrResult = $connection->getResults()[0];
        $connection->executeQuery("INSERT INTO `Diverse` (diverse)"
                . " VALUES ('__TEST__PHP__UNIT__');");

        $gw = new DiverseGateway(new Connection($base, $login, $password));
        $result = $gw->getAllDiverse();
        $connection->executeQuery("DELETE from Diverse WHERE diverse = '__TEST__PHP__UNIT__';");
        
        $this->assertEquals(4, count($result[0]));
        
        $nbr = $nbrResult[0];
        
        $this->assertTrue(isset($result[$nbr]["ID"]));
        $this->assertTrue(isset($result[$nbr]["diverse"]));
    }
}
