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
     * Get number of plane to display which are in the middle loft in Database
     * @return int
     */
    public function getNbMiddlePlaneDisplay() :int {
        $query = "SELECT * FROM Parameter WHERE display=\"TRUE\" AND (name=\"Middle1\" OR name=\"Middle2\" OR name=\"Middle3\" OR name=\"Middle4\");";
        $this->connection->executeQuery($query);
        
        return $this->connection->getNbResults();
    }
}
?>

