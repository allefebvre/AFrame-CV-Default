 <?php

class ModelDefaultTable {

    /**
     * Fill table with Others object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array     
     */
    public static function getAllDefaultTable(string $tableName) :array {

        global $base, $login, $password;

        $defaultTablesGW = new DefaultTableGateway(new Connection($base, $login, $password));
        $results = $defaultTablesGW->getAllDefaultTables($tableName);
       
        return $results;
    }
    
    /**
     * 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $tableName
     * @param int $id
     * @return array
     */
    public static function deleteDefaultLine(string $tableName, int $id) {

        global $base, $login, $password;

        $defaultTablesGW = new DefaultTableGateway(new Connection($base, $login, $password));
        $results = $defaultTablesGW->deleteDefaultLine($tableName, $id);
       
    }
}
