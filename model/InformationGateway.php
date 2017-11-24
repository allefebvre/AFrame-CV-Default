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
    
    /**
     * 
     * @param int $id
     * @return array
     */
    public function getOneInformation(int $id) :array {
        $query='SELECT * FROM Information WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        return $this->connection->getResults();
    }
}
?>
