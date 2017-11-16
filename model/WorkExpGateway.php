<?php
class WorkExpGateway {
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all work experiences on database
     * @return type
     */
    public function getAllWorkExps (){
        $query='SELECT * FROM WorkExp;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>

