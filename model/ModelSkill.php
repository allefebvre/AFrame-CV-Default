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
}
?>  

