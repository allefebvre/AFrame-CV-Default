<?php
class InformationGateway {
    
    private $connection;
    
    public function __construct(Connection $connection) {
        $this->connection=$connection;
    }
     
    /**
     * Get all Information in Database
     * @return array
     */
    public function getAllInformation() :array {
        $query='SELECT * FROM Information;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get an Information by id in Database
     * @param int $id
     * @return array
     */
    public function getOneInformation(int $id) :array {
        $query='SELECT * FROM Information WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults();
    }
    
    /**
     * Update an Information by id in Database
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
    public function updateById(int $id, string $status, string $name, string $firstName, string $photo, string $age, string $address, string $phone, string $mail){
        $query = 'UPDATE Information SET status=:status, name=:name, firstName=:firstName, photo=:photo, age=:age, address=:address, phone=:phone, mail=:mail  WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':status' => array($status, PDO::PARAM_STR),
            ':name' => array($name, PDO::PARAM_STR),
            ':firstName' => array($firstName, PDO::PARAM_STR),
            ':photo' => array($photo, PDO::PARAM_STR),
            ':age' => array($age, PDO::PARAM_STR),
            ':address' => array($address, PDO::PARAM_STR),
            ':phone' => array($phone, PDO::PARAM_STR),
            ':mail' => array($mail, PDO::PARAM_STR)           
        ));
    }
    
    /**
     * Insert an Information in Database
     * @param string $status
     * @param string $name
     * @param string $firstName
     * @param string $photo
     * @param string $age
     * @param string $address
     * @param string $phone
     * @param string $mail
     */
    public function insert(string $status, string $name, string $firstName, string $photo, string $age, string $address, string $phone, string $mail){
        $query = 'INSERT INTO Information (`status`, `name`, `firstName`, `photo`, `age`, `address`, `phone`, `mail`) VALUES (:status, :name, :firstName, :photo, :age, :address, :phone, :mail)';
        $this->connection->executeQuery($query, array(
            ':status' => array($status, PDO::PARAM_STR),
            ':name' => array($name, PDO::PARAM_STR),
            ':firstName' => array($firstName, PDO::PARAM_STR),
            ':photo' => array($photo, PDO::PARAM_STR),
            ':age' => array($age, PDO::PARAM_STR),
            ':address' => array($address, PDO::PARAM_STR),
            ':phone' => array($phone, PDO::PARAM_STR),
            ':mail' => array($mail, PDO::PARAM_STR)           
        ));
    }
}
?>
