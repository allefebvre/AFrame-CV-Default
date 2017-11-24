<?php
class ModelParameter {
    
    /**
     * Fill table with Parameter object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllParameter() :array {

 	global $base, $login, $password;

        $parameterGW = new ParameterGateway(new Connection($base, $login, $password));
        $results = $parameterGW->getAllParameter(); 
        $data = array();
        foreach ($results as $row){
            $data[] = new Parameter ($row['ID'], $row['name'], $row['display']);
        }
        return $data;
    }
}
?>  

