<?php

class ModelJournal {

    /**
     * Fill table with Journals object array from a SQL query
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllJournals() :array {

        global $base, $login, $password;

        $journalGW = new JournalGateway(new Connection($base, $login, $password));
        $results = $journalGW->getAllJournals();
        $data = array();
        foreach ($results as $row) {
            $data[] = new Journal($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);
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
    public static function getOneJournal(int $id) : Journal {
        
 	global $base, $login, $password;

        $journalGW = new JournalGateway(new Connection($base, $login, $password));
        $row = $journalGW->getOneJournal($id);
        $data = new Journal ($row[0]['ID'], $row[0]['reference'], $row[0]['authors'], $row[0]['title'], $row[0]['date'], $row[0]['journal'], $row[0]['volume'], $row[0]['number'], $row[0]['pages'], $row[0]['note'], $row[0]['abstract'], $row[0]['keywords'], $row[0]['series'], $row[0]['localite'], $row[0]['publisher'], $row[0]['editor'], $row[0]['pdf'], $row[0]['date_display'], $row[0]['category_id']);
       
        return $data;
    }
}
?>  
