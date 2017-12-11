<?php
class DiverseGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
       
    /**
     * Get all diverse personal information on database
     * @return array
     */
    public function getAllDiverse() :array {
        $query='SELECT * FROM Diverse;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
    
    /**
     * Get a Diverse by id in Database
     * @param int $id
     * @return array
     */
    public function getOneDiverse(int $id) :array {
        $query='SELECT * FROM Diverse WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        return $this->connection->getResults()[0];
    }
    
    /**
     * Update a Diverse by id Database
     * @param int $id
     * @param string $diverse
     */
    public function updateById(int $id, string $diverse){
        $query = 'UPDATE Diverse SET diverse=:diverse WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':diverse' => array($diverse, PDO::PARAM_STR)
        ));
    }
    
    /**
     * Insert a Diverse in Database
     * @param string $diverse
     */
    public function insert(string $diverse){
        $query = 'INSERT INTO Diverse (`diverse`) VALUES (:diverse);';
        $this->connection->executeQuery($query, array(
            ':diverse' => array($diverse, PDO::PARAM_STR)
        ));
    } 
}
?>

