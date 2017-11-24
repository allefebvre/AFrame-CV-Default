<?php
class ModelDiverse {
    
    /**
     * Fill table with Diverse object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllDiverse() :array {

 	global $base, $login, $password;

        $diverseGW = new DiverseGateway(new Connection($base, $login, $password));
        $results = $diverseGW->getAllDiverse(); 
        $data = array();
        foreach ($results as $row){
            $data[] = new Diverse ($row['ID'], $row['diverse']);
        }
        return $data;
    }
    
    public static function getOneDiverse(int $id) : Diverse {

 	global $base, $login, $password;

        $diverseGW = new DiverseGateway(new Connection($base, $login, $password));
        $row = $diverseGW->getOnDiverse($id);
        $data = new Diverse ($row[0]['ID'], $row[0]['diverse']);
        return $data;
    }
}
?>  
