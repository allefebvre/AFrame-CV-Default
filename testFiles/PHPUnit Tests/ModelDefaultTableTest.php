<?php

use PHPUnit\Framework\TestCase;

class ModelDefaultTableTest extends TestCase {
    
    /**
     * @beforeClass
     */
    public static function setUpBeforeClass() {
        require_once 'model/ModelDefaultTable.php';
        require_once 'model/DefaultTableGateway.php';
        require_once 'model/ModelSection.php';
        require_once 'model/SectionGateway.php';
        require_once 'model/Section.php';
        require_once 'model/ModelParameter.php';
        require_once 'model/ParameterGateway.php';
        require_once 'config/config.php';
    }
    
    public function test1(){
        $base = $GLOBALS['base'];
        $login = $GLOBALS['login'];
        $password = $GLOBALS['password'];
        $defaultTableGateway = new DefaultTableGateway(new Connection($base, $login, $password));
        
        $result = ModelDefaultTable::getAllDefaultTable("section");
        $expected = $defaultTableGateway->getAllDefaultTables("section");
        
        $this->assertEquals($expected, $result);
    }
    
    public function test2(){
        $base = $GLOBALS['base'];
        $login = $GLOBALS['login'];
        $password = $GLOBALS['password'];
        
        $connection = new Connection($base, $login, $password);
       
        $query = "DELETE FROM section WHERE ID = 101";
        $connection->executeQuery($query);

        $query = "INSERT INTO section (`title`, `id`)  VALUES ('test', 101);";
        $connection->executeQuery($query);
                
        $query = "SELECT * FROM section WHERE id = 101";
        $connection->executeQuery($query);
        
        ModelDefaultTable::deleteDefaultLine('section', 101);

        $this->assertEquals(0, $connection->getNbResults()[0]);

        $query = "DELETE FROM section WHERE ID = 101";
        $connection->executeQuery($query);
    }
    
    
    
}