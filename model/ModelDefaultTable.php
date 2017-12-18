 <?php

class ModelDefaultTable {

    /**
     * Get all Lines of a Table in Database
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
     * Delete a Line of a Table by id
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $tableName
     * @param int $id
     */
    public static function deleteDefaultLine(string $tableName, int $id) {
        global $base, $login, $password;

        if($tableName === "section") {
            $sectionTitle = ModelSection::getSectionById($id)->getTitle();
            $count = ModelParameter::countParameterBySection($sectionTitle);
            if($count > 0) {
                $parameters = ModelParameter::getAllParametersBySection($sectionTitle);
                foreach($parameters as $parameter) {
                    ModelParameter::updateParameter($parameter->getId(), "FALSE", NULL, "FALSE");
                }
            }       
        }
        
        $defaultTablesGW = new DefaultTableGateway(new Connection($base, $login, $password));
        $defaultTablesGW->deleteDefaultLine($tableName, $id);        
    }
}
