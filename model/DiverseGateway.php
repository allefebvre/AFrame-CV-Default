<?php
class DiverseGateway {
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
       
    /**
     * Get all diverse personal information on database
     * @return type
     */
    public function getAllDiverse (){
        $query='SELECT * FROM Diverse;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>

