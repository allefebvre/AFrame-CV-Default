<?php

class ModelByDate {

    /**
     * Fil table with ByDate object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \ByDate
     */
    public static function getAllByDates() {

        global $base, $login, $password;

        $byDateGW = new ByDateGateway(new Connection($base, $login, $password));
        $results = $byDateGW->getAllByDates();
        $data = [];
        foreach ($results as $row) {
            $data[] = new ByDate($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);
        }
        return $data;
    }

}
?>  
