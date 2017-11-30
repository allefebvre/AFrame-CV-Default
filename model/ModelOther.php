<?php

class ModelOther {

    /**
     * Get all Others in Database
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
     * Get an Other by id in Database 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Other
     */
    public static function getOneConference(int $id): Other {
        global $base, $login, $password;

        $otherGW = new OtherGateway(new Connection($base, $login, $password));
        $row = $otherGW->getOneOther($id);
        $data = new Other($row[0]['ID'], $row[0]['reference'], $row[0]['authors'], $row[0]['title'], $row[0]['date'], $row[0]['journal'], $row[0]['volume'], $row[0]['number'], $row[0]['pages'], $row[0]['note'], $row[0]['abstract'], $row[0]['keywords'], $row[0]['series'], $row[0]['localite'], $row[0]['publisher'], $row[0]['editor'], $row[0]['pdf'], $row[0]['date_display'], $row[0]['category_id']);

        return $data;
    }
    
    /**
     * Update an Other by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @param string $reference
     * @param string $authors
     * @param string $title
     * @param string $date
     * @param string $journal
     * @param string $volume
     * @param string $number
     * @param string $pages
     * @param string $note
     * @param string $abstract
     * @param string $keywords
     * @param string $series
     * @param string $localite
     * @param string $publisher
     * @param string $editor
     * @param string $pdf
     * @param string $date_display
     * @param int $category_id
     */
    public static function updateById(int $id, string $reference, string $authors, string $title, string $date, string $journal, string $volume, string $number, string $pages, string $note, string $abstract, string $keywords, string $series, string $localite, string $publisher, string $editor, string $pdf, string $date_display, int $category_id){
        global $base, $login, $password;

        $otherGW = new OtherGateway(new Connection($base, $login, $password));
        $otherGW->updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
    }
    
    /**
     * Insert an Other in Database 
     * @global string $base
     * @global string $login
     * @global string $password
     * @param string $reference
     * @param string $authors
     * @param string $title
     * @param string $date
     * @param string $journal
     * @param string $volume
     * @param string $number
     * @param string $pages
     * @param string $note
     * @param string $abstract
     * @param string $keywords
     * @param string $series
     * @param string $localite
     * @param string $publisher
     * @param string $editor
     * @param string $pdf
     * @param string $date_display
     * @param int $category_id
     */
    public static function insert(string $reference, string $authors, string $title, string $date, string $journal, string $volume, string $number, string $pages, string $note, string $abstract, string $keywords, string $series, string $localite, string $publisher, string $editor, string $pdf, string $date_display, int $category_id){
        global $base, $login, $password;

        $otherGW = new OtherGateway(new Connection($base, $login, $password));
        $otherGW->insert( $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
    }
}
?>  
