<?php

class ModelOther {

    /**
     * Fill table with Others object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllOthers() :array {

        global $base, $login, $password;

        $otherGW = new OtherGateway(new Connection($base, $login, $password));
        $results = $otherGW->getAllOthers();
        $data = array();
        foreach ($results as $row) {
            $data[] = new Other ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);
        }
        return $data;
    }

}
?>  
