<?php
class WorkExpGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all work experiences on database
     * @return array
     */
    public function getAllWorkExps() :array {
        $query='SELECT * FROM WorkExp;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>

