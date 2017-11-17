<?php
class JournalGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all journals publication on database
     * @return array
     */
    public function getAllJournals() :array {
        $query='SELECT * FROM Journal ORDER BY date DESC;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>