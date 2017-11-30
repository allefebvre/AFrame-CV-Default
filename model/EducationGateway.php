<?php
class EducationGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all Education in Database
     * @return array
     */
    public function getAllEducation() :array {
        $query='SELECT * FROM Education;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get an Education by id in Database
     * @param int $id
     * @return array
     */
    public function getOneEducation(int $id) :array {
        $query='SELECT * FROM Education WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults();
    }
    
    /**
     * Update an Education by id in Database
     * @param int $id
     * @param string $date
     * @param string $education
     */
    public function updateById(int $id, string $date, string $education){
        $query = 'UPDATE Education SET date=:date, education=:education WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':date' => array($date, PDO::PARAM_STR),
            ':education' => array($education, PDO::PARAM_STR)           
        ));
    }
    
    /**
     * Insert an Education in Database
     * @param string $date
     * @param string $education
     */
    public function insert(string $date, string $education){
        $query = 'INSERT INTO Education (`date`, `education`) VALUES (:date, :education);';
        $this->connection->executeQuery($query, array(
            ':date' => array($date, PDO::PARAM_STR),
            ':education' => array($education, PDO::PARAM_STR)           
        ));
    }
}
?>
