<?php

class MenuGateway {
    
    private $connection;
    
    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }
    
    /**
     * Get all Menus in Database
     * @return array
     */
    public function getAllActiveMenus() :array {
        $query='SELECT * FROM menu WHERE actif=:active  ORDER BY position;';
        $this->connection->executeQuery($query, array(
            ':active' => array(1, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults();
    }
}

