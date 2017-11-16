<?php
class SkillGateway {
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all skill personal information on database
     * @return type
     */
    public function getAllSkills (){
        $query='SELECT * FROM Skill;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
}
?>

