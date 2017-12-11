<?php
class WorkExpGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all Work Experiences in Database
     * @return array
     */
    public function getAllWorkExps() :array {
        $query='SELECT * FROM WorkExp;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get a Work Experience by id in Database
     * @param int $id
     * @return array
     */
    public function getOneWorkExp(int $id) :array {
        $query='SELECT * FROM WorkExp WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults()[0];
    }
    
    /**
     * Update a Work Experience by id in Database
     * @param int $id
     * @param string $date
     * @param string $workExp
     */
    public function updateById(int $id, string $date, string $workExp){
        $query = 'UPDATE WorkExp SET date=:date, workExp=:workExp WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':date' => array($date, PDO::PARAM_STR),
            ':workExp' => array($workExp, PDO::PARAM_STR)          
        ));
    }
    
    /**
     * Insert a Work Experience in Database
     * @param string $date
     * @param string $workExp
     */
    public function insert(string $date, string $workExp){
        $query = 'INSERT INTO WorkExp (`date`, `workExp`) VALUES(:date, :workExp);';
        $this->connection->executeQuery($query, array(
            ':date' => array($date, PDO::PARAM_STR),
            ':workExp' => array($workExp, PDO::PARAM_STR)       
        ));
    }
}
?>

