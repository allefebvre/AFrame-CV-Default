<?php
class DefaultTableGateway{
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * 
     * @param string $tableName
     * @return array
     */
    public function getAllDefaultTables(string $tableName) :array {
        $query="DESC $tableName;";
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>
