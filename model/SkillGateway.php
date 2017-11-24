<?php
class SkillGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all skill personal information on database
     * @return array
     */
    public function getAllSkills() :array {
        $query='SELECT * FROM Skill;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
    
    /**
     * 
     * @param int $id
     * @return array
     */
    public function getOneSkill(int $id) :array {
        $query='SELECT * FROM Skill WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        return $this->connection->getResults();
    }
}
?>

