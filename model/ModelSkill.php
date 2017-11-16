<?php
class ModelSkill {
    
    /**
     * Fil table with Skills object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \Skill
     */
    public static function getAllSkills (){

 	global $base, $login, $password;

        $skillGW = new SkillGateway(new Connection($base, $login, $password));
        $results = $skillGW->getAllSkills(); 
        foreach ($results as $row){
            $data[] = new Skill ($row['ID'], $row['category'], $row['details']);
        }
        return $data;
	}
}
?>  

