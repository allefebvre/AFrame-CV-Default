<?php
class JournalGateway {
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all journals publication on database
     * @return type
     */
    public function getAllJournals (){
        $query='SELECT * FROM Journal ORDER BY date DESC;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>