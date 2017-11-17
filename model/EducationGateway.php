<?php
class EducationGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all education personal information on database
     * @return array
     */
    public function getAllEducation() :array {
        $query='SELECT * FROM Education;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>
