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
    
    /**
     * 
     * @param int $id
     * @return array
     */
    public function getOneWorkExp(int $id) :array {
        $query='SELECT * FROM WorkExp WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        return $this->connection->getResults();
    }
    
     public function updateById(int $id, string $date, string $workExp){
        $query = 'UPDATE WorkExp SET date=:date, workExp=:workExp WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':date' => array($date, PDO::PARAM_STR),
            ':workExp' => array($workExp, PDO::PARAM_STR)
            
        ));
    }
}
?>

