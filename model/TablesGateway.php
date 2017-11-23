<?php
class TablesGateway{
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all education personal information on database
     * @return array
     */
    public function getAllTables() :array {
        $query='SHOW TABLES;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>
