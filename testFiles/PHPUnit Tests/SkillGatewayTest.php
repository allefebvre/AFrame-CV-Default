<?php

use PHPUnit\Framework\TestCase;

class CompetenceGatewayTest extends TestCase {

    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/Connection.php';
        require_once 'model/SkillGateway.php';
    }

    public function test() {
        require 'config/config.php';

        $connection = new Connection($base, $login, $password);

        try {
            $connection->executeQuery("DELETE from Skill WHERE category = '__TEST__PHP__UNIT__';");
        } catch (Exception $ex) { }
        
        $connection->executeQuery("SELECT COUNT(*) FROM Skill");
        $nbrResult = $connection->getResults()[0];
        $connection->executeQuery("INSERT INTO `Skill` (category, details)"
                . " VALUES ('__TEST__PHP__UNIT__', 'details');");

        $gw = new SkillGateway(new Connection($base, $login, $password));
        $result = $gw->getAllSkills();
        $connection->executeQuery("DELETE from Skill WHERE category = '__TEST__PHP__UNIT__';");
        
        $this->assertEquals(6, count($result[0]));
        
        $nbr = $nbrResult[0];
        
        $this->assertTrue(isset($result[$nbr]["ID"]));
        $this->assertTrue(isset($result[$nbr]["category"]));
        $this->assertTrue(isset($result[$nbr]["details"]));
    }
}
