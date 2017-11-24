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
    
    /**
     * 
     * @param int $id
     * @return array
     */
    public function getOneConference(int $id) :array {
        $query='SELECT * FROM Conference WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        return $this->connection->getResults();
    }
}
?>
