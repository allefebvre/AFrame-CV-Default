<?php
class ModelWorkExp {
    
    /**
     * Get all Work Experience in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllWorkExp() :array {
 	global $base, $login, $password;

        $workExpGW = new WorkExpGateway(new Connection($base, $login, $password));
        $results = $workExpGW->getAllWorkExps();
        $data = array();
        foreach ($results as $row){
            $data[] = new WorkExp ($row['ID'], $row['date'], $row['workExp']);
        }
        
        return $data;
    }
    
    /**
     * Get a Work Experience by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return WorkExp
     */
    public static function getOneWorkExp(int $id) : WorkExp {
 	global $base, $login, $password;

        $workExpGW = new WorkExpGateway(new Connection($base, $login, $password));
        $row = $workExpGW->getOneWorkExp($id);
        $data = new WorkExp ($row[0]['ID'], $row[0]['date'], $row[0]['workExp']);
        
        return $data;
    }
    
    /**
     * Update a Work Experience by id in Database 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @param string $date
     * @param string $workExp
     */
    public static function updateById(int $id, string $date, string $workExp) {
        global $base, $login, $password;

        $workExpGW = new WorkExpGateway(new Connection($base, $login, $password));
        $workExpGW->updateById($id, $date, $workExp);
    }
    
    /**
     * Insert a Work Experience in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $date
     * @param string $workExp
     */
    public static function insert(string $date, string $workExp) {
        global $base, $login, $password;

        $workExpGW = new WorkExpGateway(new Connection($base, $login, $password));
        $workExpGW->insert($date, $workExp);
    }
}
?>  

