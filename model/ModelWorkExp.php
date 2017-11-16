<?php
class ModelWorkExp {
    
    /**
     * Fil table with WorkExp object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \WorkExp
     */
    public static function getAllWorkExp (){

 	global $base, $login, $password;

        $WorkExpGW = new WorkExpGateway(new Connection($base, $login, $password));
        $results = $WorkExpGW->getAllWorkExps(); 
        foreach ($results as $row){
            $data[] = new WorkExp ($row['ID'], $row['date'], $row['workExp']);
        }
        return $data;
	}
}
?>  

