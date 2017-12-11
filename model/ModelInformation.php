
<?php
class ModelInformation {
    
    /**
     * Get all Information in Database
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
    
    /**
     * Get an Information by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Information
     */
    public static function getOneInformation(int $id) : Information {
 	global $base, $login, $password;

        $informationGW = new InformationGateway(new Connection($base, $login, $password));
        $row = $informationGW->getOneInformation($id);
        $data = new Information ($row['ID'], $row['status'], $row['name'], $row['firstName'], $row['photo'], $row['age'], $row['address'], $row['phone'], $row['mail']);
        
        return $data;
    }
    
    /**
     * Update an information in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @param string $status
     * @param string $name
     * @param string $firstName
     * @param string $photo
     * @param string $age
     * @param string $address
     * @param string $phone
     * @param string $mail
     */
    public static function updateById(int $id, string $status, string $name, string $firstName, string $photo, string $age, string $address, string $phone, string $mail) {
        global $base, $login, $password;

        $informationGW = new InformationGateway(new Connection($base, $login, $password));
        $informationGW->updateById($id, $status, $name, $firstName, $photo, $age, $address, $phone, $mail);
    }
    
    /**
     * Insert an Information in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $status
     * @param string $name
     * @param string $firstName
     * @param string $photo
     * @param string $age
     * @param string $address
     * @param string $phone
     * @param string $mail
     */
    public static function insert(string $status, string $name, string $firstName, string $photo, string $age, string $address, string $phone, string $mail) {
        global $base, $login, $password;

        $informationGW = new InformationGateway(new Connection($base, $login, $password));
        $informationGW->insert($status, $name, $firstName, $photo, $age, $address, $phone, $mail);
    }
}
?>  
