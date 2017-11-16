<?php
class ModelEducation {
    
    /**
     * Fil table with Education object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \Education
     */
    public static function getAllEducation (){

 	global $base, $login, $password;

        $EducationGW = new EducationGateway(new Connection($base, $login, $password));
        $results = $EducationGW->getAllEducation(); 
        foreach ($results as $row){
            $data[] = new Education ($row['ID'], $row['date'], $row['education']);
        }
        return $data;
	}
}
?>  

