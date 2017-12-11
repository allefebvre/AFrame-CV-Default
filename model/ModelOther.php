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
        $data = new Other($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['category_id']);

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
    public static function updateById(int $id, string $reference, string $authors, string $title, string $date, string $journal = NULL, string $volume = NULL, string $number = NULL, string $pages = NULL, string $note = NULL, string $abstract = NULL, string $keywords = NULL, string $series = NULL, string $localite = NULL, string $publisher = NULL, string $editor = NULL, string $pdf = NULL, string $date_display = NULL, int $category_id = NULL){
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
    public static function insert(string $reference, string $authors, string $title, string $date, string $journal = NULL, string $volume = NULL, string $number = NULL, string $pages = NULL, string $note = NULL, string $abstract = NULL, string $keywords = NULL, string $series = NULL, string $localite = NULL, string $publisher = NULL, string $editor = NULL, string $pdf = NULL, string $date_display = NULL, int $category_id = NULL){
        global $base, $login, $password;

        $otherGW = new OtherGateway(new Connection($base, $login, $password));
        $otherGW->insert( $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
    }
}
?>  
