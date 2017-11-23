<?php
class ParameterGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all parameter on database
     * @return array
     */
    public function getAllParameter() :array {
        $query='SELECT * FROM Parameter;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>

