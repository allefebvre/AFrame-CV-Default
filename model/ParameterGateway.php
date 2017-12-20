<?php
class ParameterGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all Parameter in Database
     * @return array
     */
    public function getAllParameter() :array {
        $query = 'SELECT * FROM Parameter;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Update a Parameter by id in Database
     * @param int $id
     * @param string $display
     * @param string $section
     * @param string $scroll
     */
    public function updateParameter(int $id, string $display, string $section = NULL, string $scroll) {
        $query = 'UPDATE Parameter SET display=:display, section=:section, scroll=:scroll WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':display' => array($display, PDO::PARAM_STR),
            ':section' => array($section, PDO::PARAM_STR),
            ':scroll' => array($scroll, PDO::PARAM_STR),
            ':id' => array ($id, PDO::PARAM_INT)
        ));
    }
    
    /**
     * Get the Parameter with the name "Publications" in Database
     * @return array
     */
    public function getParameterPublications() :array {
        $name = "Publications";
        $query = "SELECT * FROM Parameter WHERE name=:name;";
        $this->connection->executeQuery($query, array(
           ':name' => array($name, PDO::PARAM_STR) 
        ));
        
        return $this->connection->getResults();
    }
    
    /**
     * Count number of plane to display which are in the middle loft in Database
     * @return int
     */
    public function countMiddlePlaneDisplay() :int {
        $query = "SELECT * FROM Parameter WHERE display=:display AND (name=:middle1 OR name=:middle2 OR name=:middle3 OR name=:middle4);";
        $this->connection->executeQuery($query, array(
            ':display' => array('TRUE', PDO::PARAM_STR),
            ':middle1' => array('Middle1', PDO::PARAM_STR),
            ':middle2' => array('Middle2', PDO::PARAM_STR),
            ':middle3' => array('Middle3', PDO::PARAM_STR),
            ':middle4' => array('Middle4', PDO::PARAM_STR)
        ));
        
        return $this->connection->getNbResults();
    }
    
    /**
     * Count Parameter by section in Database
     * @param string $section
     * @return int
     */
    public function countParameterBySection(string $section) :int {
        $query='SELECT COUNT(*) FROM Parameter WHERE section=:section;';
        $this->connection->executeQuery($query, array(
            ':section' => array($section, PDO::PARAM_STR)
        ));
        
        return $this->connection->getResults()[0][0];
    }
    
    /**
     * Get all Parameters by section in Database
     * @param string $section
     * @return array
     */
    public function getAllParametersBySection(string $section) :array {
        $query = 'SELECT * FROM Parameter WHERE section=:section;';
        $this->connection->executeQuery($query, array(
            ':section' => array($section, PDO::PARAM_STR)
        ));
        
        return $this->connection->getResults();
    }
}
?>