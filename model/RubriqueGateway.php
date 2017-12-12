<?php

class RubriqueGateway {
    
    private $connection;
    
    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }
    
    /**
     * Get a Rubrique by menu_id in Database
     * @return array
     */
    public function getRubriqueByMenuId(int $menu_id) :array {
        $query='SELECT * FROM rubrique WHERE menu_id=:menu_id;';
        $this->connection->executeQuery($query, array(
            ':menu_id' => array($menu_id, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults()[0];
    }
}

