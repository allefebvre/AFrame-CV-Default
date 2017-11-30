<?php
class ModelSkill {
    
    /**
     * Fill table with Skills object array from a SQL query
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
     * 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Conference
     */
    public static function getOneSkill(int $id) : Skill {

 	global $base, $login, $password;

        $skillGW = new SkillGateway(new Connection($base, $login, $password));
        $row = $skillGW->getOneSkill($id);
        $data = new Skill ($row[0]['ID'], $row[0]['category'], $row[0]['details']);
        
        return $data;
    }
    
    /**
     * 
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
     * 
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

