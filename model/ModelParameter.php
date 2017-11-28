<?php
class ModelParameter {
    
    /**
     * Fill table with Parameter object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllParameter() :array {
 	global $base, $login, $password;

        $parameterGW = new ParameterGateway(new Connection($base, $login, $password));
        $results = $parameterGW->getAllParameter(); 
        $data = array();
        foreach ($results as $row){
            $data[] = new Parameter ($row['ID'], $row['name'], $row['display'], $row['section']);
        }
        
        return $data;
    }
    
    /**
     * Update a Parameter display column
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id id of parameter to update
     * @param string $display
     * @param string $section 
     */
    public static function updateParameterDisplay(int $id, string $display, string $section = NULL) {
        global $base, $login, $password;

        $parameterGW = new ParameterGateway(new Connection($base, $login, $password));
        $parameterGW->updateParameterDisplay($id, $display, $section);
    }
    
    /**
     * Get the Parameter with the name "Publications"
     * @global string $base
     * @global string $login
     * @global string $password
     * @return Parameter
     */
    public static function getParameterPublications() :Parameter{
        global $base, $login, $password;
        
        $parameterGW = new ParameterGateway(new Connection($base, $login, $password));
        $result = $parameterGW->getParameterPublications();
        $parameter = new Parameter($result[0]['ID'], $result[0]['name'], $result[0]['display']);
        
        return $parameter;
    }
}
?>  

