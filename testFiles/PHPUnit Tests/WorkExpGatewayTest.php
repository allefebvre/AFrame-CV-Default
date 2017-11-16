<?php

use PHPUnit\Framework\TestCase;

class WorkExpGatewayTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/WorkExpGateway.php';
    }

    public function test() {
        require 'config/config.php';

        $connection = new Connection($base, $login, $password);

        try {
            $connection->executeQuery("DELETE from WorkExp WHERE workExp = '__TEST__PHP__UNIT__';");
        } catch (Exception $ex) { }
        
        $connection->executeQuery("SELECT COUNT(*) FROM WorkExp");
        $nbrResult = $connection->getResults()[0];
        $connection->executeQuery("INSERT INTO `WorkExp` (date, workExp)"
                . " VALUES ('2000-01-01', '__TEST__PHP__UNIT__');");

        $gw = new WorkExpGateway(new Connection($base, $login, $password));
        $result = $gw->getAllWorkExps();
        $connection->executeQuery("DELETE from WorkExp WHERE workExp = '__TEST__PHP__UNIT__';");
        
        $this->assertEquals(6, count($result[0]));
        
        $nbr = $nbrResult[0];
        
        $this->assertTrue(isset($result[$nbr]["ID"]));
        $this->assertTrue(isset($result[$nbr]["date"]));
        $this->assertTrue(isset($result[$nbr]["workExp"]));
    }
}
