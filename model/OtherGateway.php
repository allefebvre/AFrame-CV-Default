<?php
class OtherGateway {
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all others publaction on database
     * @return type
     */
    public function getAllOthers (){
        $query='SELECT * FROM Other ORDER BY date DESC;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>
