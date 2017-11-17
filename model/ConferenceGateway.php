<?php
class ConferenceGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
    
    /**
     * Get all conferences publication on database
     * @return array
     */
    public function getAllConferences() :array {
        $query='SELECT * FROM Conference ORDER BY date DESC;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>
