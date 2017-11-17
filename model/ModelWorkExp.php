<?php
class ModelWorkExp {
    
    /**
     * Fill table with WorkExp object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllWorkExp() :array {

 	global $base, $login, $password;

        $WorkExpGW = new WorkExpGateway(new Connection($base, $login, $password));
        $results = $WorkExpGW->getAllWorkExps();
        $data = array();
        foreach ($results as $row){
            $data[] = new WorkExp ($row['ID'], $row['date'], $row['workExp']);
        }
        return $data;
    }
}
?>  

