<?php

class ModelOther {

    /**
     * Fil table with Others object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \Other
     */
    public static function getAllOthers() {

        global $base, $login, $password;

        $otherGW = new OtherGateway(new Connection($base, $login, $password));
        $results = $otherGW->getAllOthers();
        $data = [];
        foreach ($results as $row) {
            $data[] = new Other ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);
        }
        return $data;
    }

}
?>  
