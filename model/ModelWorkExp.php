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
    /**
     * 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Conference
     */
    public static function getOneWorkExo(int $id) : WorkExp {

 	global $base, $login, $password;

        $WorkExpGW = new WorkExpGateway(new Connection($base, $login, $password));
        $row = $WorkExpGW->getOneWorkExp($id);
        $data = new WorkExp ($row[0]['ID'], $row[0]['date'], $row[0]['workExp']);
        
        return $data;
    }
    
    /**
     * 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @param string $date
     * @param string $workExp
     */
    public static function updateById(int $id, string $date, string $workExp) {
        global $base, $login, $password;

        $WorkExpGW = new WorkExpGateway(new Connection($base, $login, $password));
        $WorkExpGW->updateById($id, $date, $workExp);
    }
}
?>  

