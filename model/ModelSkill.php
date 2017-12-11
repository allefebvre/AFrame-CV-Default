<?php
class ModelSkill {
    
    /**
     * Get all Skills in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllSkills() :array {
 	global $base, $login, $password;

        $skillGW = new SkillGateway(new Connection($base, $login, $password));
        $results = $skillGW->getAllSkills();
        $data = array();
        foreach ($results as $row){
            $data[] = new Skill ($row['ID'], $row['category'], $row['details']);
        }
        
        return $data;
    }
    
    /**
     * Get a Skill by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Skill
     */
    public static function getOneSkill(int $id) : Skill {
 	global $base, $login, $password;

        $skillGW = new SkillGateway(new Connection($base, $login, $password));
        $row = $skillGW->getOneSkill($id);
        $data = new Skill ($row['ID'], $row['category'], $row['details']);
        
        return $data;
    }
    
    /**
     * Update a Skill by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @param string $category
     * @param string $details
     */
    public static function updateById(int $id, string $category, string $details) {
        global $base, $login, $password;

        $skillGW = new SkillGateway(new Connection($base, $login, $password));
        $skillGW->updateById($id, $category, $details);
    }
    
    /**
     * Insert a Skill in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $category
     * @param string $details
     */
    public static function insert(string $category, string $details) {
        global $base, $login, $password;

        $skillGW = new SkillGateway(new Connection($base, $login, $password));
        $skillGW->insert( $category, $details);
    }
}
?>  

