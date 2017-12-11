<?php
class SkillGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all Skills in Database
     * @return array
     */
    public function getAllSkills() :array {
        $query='SELECT * FROM Skill;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get a Skill by id in Database
     * @param int $id
     * @return array
     */
    public function getOneSkill(int $id) :array {
        $query='SELECT * FROM Skill WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults()[0];
    }
    
    /**
     * Update a Skill by id in Database
     * @param int $id
     * @param string $category
     * @param string $details
     */
    public function updateById(int $id, string $category, string $details){
        $query = 'UPDATE Skill SET category=:category, details=:details WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':category' => array($category, PDO::PARAM_STR),
            ':details' => array($details, PDO::PARAM_STR)   
        ));
    }
    
    /**
     * Insert a Skill in Database
     * @param string $category
     * @param string $details
     */
    public function insert(string $category, string $details){
        $query = 'INSERT INTO Skill (`category`, `details`) VALUES (:category, :details);';
        $this->connection->executeQuery($query, array(
            ':category' => array($category, PDO::PARAM_STR),
            ':details' => array($details, PDO::PARAM_STR)      
        ));
    }
}
?>

