<?php
class ModelEducation {
    
    /**
     * Fill table with Education object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllEducation() :array {

 	global $base, $login, $password;

        $educationGW = new EducationGateway(new Connection($base, $login, $password));
        $results = $educationGW->getAllEducation(); 
        $data = array();
        foreach ($results as $row){
            $data[] = new Education ($row['ID'], $row['date'], $row['education']);
        }
        return $data;
    }
}
?>  

