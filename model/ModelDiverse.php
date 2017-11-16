<?php
class ModelDiverse {
    
    /**
     * Fil table with Diverse object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \Diverse
     */
    public static function getAllDiverse (){

 	global $base, $login, $password;

        $diverseGW = new DiverseGateway(new Connection($base, $login, $password));
        $results = $diverseGW->getAllDiverse(); 
        foreach ($results as $row){
            $data[] = new Diverse ($row['ID'], $row['diverse']);
        }
        return $data;
	}
}
?>  
