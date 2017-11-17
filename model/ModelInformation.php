
<?php
class ModelInformation {
    
    /**
     * Fill table with Information object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllInformation() :array {

 	global $base, $login, $password;

        $informationGW = new InformationGateway(new Connection($base, $login, $password));
        $results = $informationGW->getAllInformation(); 
        $data = array();
        foreach ($results as $row){
            $data[] = new Information ($row['ID'], $row['status'], $row['name'], $row['firstName'], $row['photo'], $row['age'], $row['address'], $row['phone'], $row['mail']);
        }
        return $data;
    }
}
?>  
