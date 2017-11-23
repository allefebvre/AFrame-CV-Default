 <?php

class ModelTables {

    /**
     * Fill table with Others object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array     
     */
    public static function getAllTables() :array {

        global $base, $login, $password;

        $tablesGW = new TablesGateway(new Connection($base, $login, $password));
        $results = $tablesGW->getAllTables();
       
        return $results;
    }
}