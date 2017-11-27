<?php
class ParameterGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
        
    /**
     * Get all Parameter on database
     * @return array
     */
    public function getAllParameter() :array {
        $query = 'SELECT * FROM Parameter;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
    
    /**
     * Update a Parameter
     * @param int $id
     * @param string $display
     * @param string $section
     */
    public function updateParameterDisplay(int $id, string $display, string $section = NULL) {
        $query = 'UPDATE Parameter SET display=:display, section=:section WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':display' => array($display, PDO::PARAM_STR),
            ':section' => array($section, PDO::PARAM_STR),
            ':id' => array ($id, PDO::PARAM_INT)
        ));
    }
    
    /**
     * Get the Parameter with the name "Publications"
     * @return array
     */
    public function getParameterPublications() :array{
        $name = "Publications";
        $query = "SELECT * FROM Parameter WHERE name=:name;";
        $this->connection->executeQuery($query, array(
           ':name' => array($name, PDO::PARAM_STR) 
        ));
        
        return $this->connection->getResults();
    }
}
?>

