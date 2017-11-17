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
}
?>

