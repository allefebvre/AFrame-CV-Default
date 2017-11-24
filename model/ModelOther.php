<?php

class ModelOther {

    /**
     * Fill table with Others object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllOthers(): array {

        global $base, $login, $password;

        $otherGW = new OtherGateway(new Connection($base, $login, $password));
        $results = $otherGW->getAllOthers();
        $data = array();
        foreach ($results as $row) {
            $data[] = new Other($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);
        }
        return $data;
    }

    /**
     * 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Conference
     */
    public static function getOneConference(int $id): Other {

        global $base, $login, $password;

        $otherGW = new OtherGateway(new Connection($base, $login, $password));
        $row = $otherGW->getOneOther($id);
        $data = new Other($row[0]['ID'], $row[0]['reference'], $row[0]['authors'], $row[0]['title'], $row[0]['date'], $row[0]['journal'], $row[0]['volume'], $row[0]['number'], $row[0]['pages'], $row[0]['note'], $row[0]['abstract'], $row[0]['keywords'], $row[0]['series'], $row[0]['localite'], $row[0]['publisher'], $row[0]['editor'], $row[0]['pdf'], $row[0]['date_display'], $row[0]['category_id']);

        return $data;
    }

}
?>  
