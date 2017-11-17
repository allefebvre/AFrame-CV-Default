<?php
class InformationGateway {
    
    private $connection;
    
    public function __construct(Connection $connection) {
        $this->connection=$connection;
    }
     
    /**
     * Get all personal information on database
     * @return array
     */
    public function getAllInformation() :array {
        $query='SELECT * FROM Information;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>
