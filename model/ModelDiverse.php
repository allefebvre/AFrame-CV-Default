<?php
class ModelDiverse {
    
    /**
     * Get all Diverse in Database
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
    
    /**
     * Get a Diverse by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Diverse
     */
    public static function getOneDiverse(int $id) : Diverse {
 	global $base, $login, $password;

        $diverseGW = new DiverseGateway(new Connection($base, $login, $password));
        $row = $diverseGW->getOneDiverse($id);
        $data = new Diverse ($row['ID'], $row['diverse']);
        
        return $data;
    }
    
    /**
     * Update a Diverse by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @param string $diverse
     */
    public static function updateById(int $id, string $diverse) {
        global $base, $login, $password;

        $diverseGW = new DiverseGateway(new Connection($base, $login, $password));
        $diverseGW->updateById($id, $diverse);
    }
    
    /**
     * Insert a Diverse in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $diverse
     */
    public static function insert(string $diverse) {
        global $base, $login, $password;

        $diverseGW = new DiverseGateway(new Connection($base, $login, $password));
        $diverseGW->insert($diverse);
    }    
}
?>  
