 <?php

class ModelTables {

    /**
     * Get all Tables name
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