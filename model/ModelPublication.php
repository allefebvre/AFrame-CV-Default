
<?php
class ModelPublication {
    
    /**
     * Get all Publication in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllPublication() :array {
 	global $base, $login, $password;

        $publicationGW = new PublicationGateway(new Connection($base, $login, $password));
        $results = $publicationGW->getAllPublications(); 
        $data =  array();
        foreach ($results as $row){
            $data[]=new Publication ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['categorie_id']);
        }
        
        return $data;
    }
    
    /**
     * Get all publication order by date
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllPublicationByDate() :array {
 	global $base, $login, $password;

        $publicationGW = new PublicationGateway(new Connection($base, $login, $password));
        $results = $publicationGW->getAllPublicationsByDate(); 
        $data =  array();
        foreach ($results as $row){
            $data[]=new Publication ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['categorie_id']);
        }
        
        return $data;
    }
    
    
    /**
     * Get all Journals in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllJournals() :array {
 	global $base, $login, $password;

        $publicationGW = new PublicationGateway(new Connection($base, $login, $password));
        $results = $publicationGW->getAllJournals(); 
        $data =  array();
        foreach ($results as $row){
            $data[]=new Publication ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['categorie_id']);
        }
        
        return $data;
    }
    
    /**
     * Get all Conferences in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllConferences() :array {
 	global $base, $login, $password;

        $publicationGW = new PublicationGateway(new Connection($base, $login, $password));
        $results = $publicationGW->getAllConferences(); 
        $data =  array();
        foreach ($results as $row){
            $data[]=new Publication ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['categorie_id']);
       
        }
        
        return $data;
    }
    
    /**
     * Get all Conferences in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllDocumentation() :array {
 	global $base, $login, $password;

        $publicationGW = new PublicationGateway(new Connection($base, $login, $password));
        $results = $publicationGW->getAllDocumentations(); 
        $data =  array();
        foreach ($results as $row){
            $data[]=new Publication ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['categorie_id']);
        }
        
        return $data;
    }
    
    /**
     * Get all Conferences in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllThesis() :array {
 	global $base, $login, $password;

        $publicationGW = new PublicationGateway(new Connection($base, $login, $password));
        $results = $publicationGW->getAllThesis(); 
        $data =  array();
        foreach ($results as $row){
            $data[]=new Publication ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['categorie_id']);
        }
        
        return $data;
    }
    
    /**
     * Get all Conferences in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @return array
     */
    public static function getAllMiscellaneous() :array {
 	global $base, $login, $password;

        $conferenceGW = new PublicationGateway(new Connection($base, $login, $password));
        $results = $conferenceGW->getAllMiscellaneous(); 
        $data =  array();
        foreach ($results as $row){
            $data[]=new Publication ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['categorie_id']);
        }
        
        return $data;
    }
    
    /**
     * Get a Conference by id in Database
     * @global string $base
     * @global string $login
     * @global string $password
     * @param int $id
     * @return Publication
     */
    public static function getOnePublication(int $id) : Publication {
 	global $base, $login, $password;

        $conferenceGW = new PublicationGateway(new Connection($base, $login, $password));
        $row = $conferenceGW->getOnePublication($id);
        $data = new Publication ($row['ID'], $row['reference'], $row['authors'], $row['title'], $row['date'], $row['journal'], $row['volume'], $row['number'], $row['pages'], $row['note'], $row['abstract'], $row['keywords'], $row['series'], $row['localite'], $row['publisher'], $row['editor'], $row['pdf'], $row['date_display'], $row['categorie_id']);
       
        return $data;
    }
    
    /**
     * Update a Conference by id in Database
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

        $conferenceGW = new PublicationGateway(new Connection($base, $login, $password));
        $conferenceGW->updateById($id, $reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
    }
    
    /**
     * Insert a Conference in Database
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

        $conferenceGW = new PublicationGateway(new Connection($base, $login, $password));
        $conferenceGW->insert($reference, $authors, $title, $date, $journal, $volume, $number, $pages, $note, $abstract, $keywords, $series, $localite, $publisher, $editor, $pdf, $date_display, $category_id);
    }
}
?>  
