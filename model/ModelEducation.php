<?php

class ModelEducation {

    /**
     * Get all Education in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllEducation(): array {
        global $base, $login, $password;

        $educationGW = new EducationGateway(new Connection($base, $login, $password));
        $results = $educationGW->getAllEducation();
        $data = array();
        foreach ($results as $row) {
            $data[] = new Education($row['ID'], $row['date'], $row['education']);
        }
        
        return $data;
    }

    /**
     * Get an Education by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Education
     */
    public static function getOneEducation(int $id): Education {
        global $base, $login, $password;

        $educationGW = new EducationGateway(new Connection($base, $login, $password));
        $row = $educationGW->getOneEducation($id);
        $data = new Education($row['ID'], $row['date'], $row['education']);

        return $data;
    }

    /**
     * Update an Education by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @param string $date
     * @param string $education
     */
    public static function updateById(int $id, string $date, string $education) {
        global $base, $login, $password;

        $educationGW = new EducationGateway(new Connection($base, $login, $password));
        $educationGW->updateById($id, $date, $education);
    }
    
    /**
     * Insert an Education in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $date
     * @param string $education
     */
    public static function insert(string $date, string $education) {
        global $base, $login, $password;

        $educationGW = new EducationGateway(new Connection($base, $login, $password));
        $educationGW->insert($date, $education);
    }
}
?>  

