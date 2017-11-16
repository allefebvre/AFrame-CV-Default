<?php

class ModelJournal {

    /**
     * Fil table with Journals object array from a SQL query
     * @global type $base
     * @global type $login
     * @global type $password
     * @return \Journal
     */
    public static function getAllJournals() {

        global $base, $login, $password;

        $journalGW = new JournalGateway(new Connection($base, $login, $password));
        $results = $journalGW->getAllJournals();
        $data = [];
        foreach ($results as $row) {
            $data[] = new Journal($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);
        }
        return $data;
    }

}
?>  
