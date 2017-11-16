
<?php
class ModelInformation {
    
    /**
     * Fil table with Information object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \Information
     */
    public static function getAllInformation (){

 	global $base, $login, $password;

        $informationGW = new InformationGateway(new Connection($base, $login, $password));
        $results = $informationGW->getAllInformation(); 
        foreach ($results as $row){
            $data[] = new Information ($row['ID'], $row['status'], $row['name'], $row['firstName'], $row['photo'], $row['age'], $row['address'], $row['phone'], $row['mail']);
        }
        return $data;
	}
}
?>  
