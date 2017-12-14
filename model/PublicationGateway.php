<?php
class PublicationGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
    
    /**
     * Get all Publication in Database
     * @return array
     */
    public function getAllPublications() :array {
        $query='SELECT * FROM Publication ORDER BY ID;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get all Publication in Database by date
     * @return array
     */
    public function getAllPublicationsByDate() :array {
        $query='SELECT * FROM Publication ORDER BY date DESC;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get all Journals in Database
     * @return array
     */
    public function getAllJournals() : array {
        $query='SELECT * FROM Publication WHERE categorie_id=1 ORDER BY ID;;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get all Conferences in Database
     * @return array
     */
    public function getAllConferences() : array {
        $query='SELECT * FROM Publication WHERE categorie_id=2 ORDER BY ID;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get all Documentation in Database
     * @return array
     */
    public function getAllDocumentations() : array {
        $query='SELECT * FROM Publication WHERE categorie_id=3 ORDER BY ID;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get all Thesis in Database
     * @return array
     */
    public function getAllThesis() : array {
        $query='SELECT * FROM Publication WHERE categorie_id=4 ORDER BY ID;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get all Conferences in Database
     * @return array
     */
    public function getAllMiscellaneous() : array {
        $query='SELECT * FROM Publication WHERE categorie_id=5 ORDER BY ID;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
    
    /**
     * Get a Conference by id in Database
     * @param int $id
     * @return array
     */
    public function getOnePublication(int $id) :array {
        $query='SELECT * FROM Publication WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults()[0];
    }
    
    /**
     * Update a Conference by id in Database
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
    public function updateById(int $id, string $reference, string $authors, string $title, string $date, string $journal = NULL, string $volume = NULL, string $number = NULL, string $pages = NULL, string $note = NULL, string $abstract = NULL, string $keywords = NULL, string $series = NULL, string $localite = NULL, string $publisher = NULL, string $editor = NULL, string $pdf = NULL, string $date_display = NULL, int $category_id = NULL){
        $query = 'UPDATE Publication SET reference=:reference, auteurs=:authors, titre=:title, date=:date, journal=:journal, volume=:volume, number=:number, pages=:pages, note=:note, abstract=:abstract, keywords=:keywords, series=:series, localite=:localite, publisher=:publisher, editor=:editor, pdf=:pdf, date_display=:date_display, categorie_id=:category_id  WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':reference' => array($reference, PDO::PARAM_STR),
            ':authors' => array($authors, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':journal' => array($journal, PDO::PARAM_STR),
            ':volume' => array($volume, PDO::PARAM_STR),
            ':number' => array($number, PDO::PARAM_STR),
            ':pages' => array($pages, PDO::PARAM_STR),
            ':note' => array($note, PDO::PARAM_STR),
            ':abstract' => array($abstract, PDO::PARAM_STR),
            ':keywords' => array($keywords, PDO::PARAM_STR),
            ':series' => array($series, PDO::PARAM_STR),
            ':localite' => array($localite, PDO::PARAM_STR),
            ':publisher' => array($publisher, PDO::PARAM_STR),
            ':editor' => array($editor, PDO::PARAM_STR),
            ':pdf' => array($pdf, PDO::PARAM_STR),
            ':date_display' => array($date_display, PDO::PARAM_STR),
            ':category_id' => array($category_id, PDO::PARAM_INT)         
        ));
    }
    
    /**
     * Insert a Conference in Database
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
    public function insert(string $reference, string $authors, string $title, string $date, string $journal = NULL, string $volume = NULL, string $number = NULL, string $pages = NULL, string $note = NULL, string $abstract = NULL, string $keywords = NULL, string $series = NULL, string $localite = NULL, string $publisher = NULL, string $editor = NULL, string $pdf = NULL, string $date_display = NULL, int $category_id = NULL){
        $query = 'INSERT INTO Publication (`reference`, `auteurs`, `titre`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `categorie_id`)  VALUES (:reference, :authors, :title, :date, :journal, :volume, :number, :pages, :note, :abstract, :keywords, :series, :localite, :publisher, :editor, :pdf, :date_display, :category_id);';
        $this->connection->executeQuery($query, array(
            ':reference' => array($reference, PDO::PARAM_STR),
            ':authors' => array($authors, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':journal' => array($journal, PDO::PARAM_STR),
            ':volume' => array($volume, PDO::PARAM_STR),
            ':number' => array($number, PDO::PARAM_STR),
            ':pages' => array($pages, PDO::PARAM_STR),
            ':note' => array($note, PDO::PARAM_STR),
            ':abstract' => array($abstract, PDO::PARAM_STR),
            ':keywords' => array($keywords, PDO::PARAM_STR),
            ':series' => array($series, PDO::PARAM_STR),
            ':localite' => array($localite, PDO::PARAM_STR),
            ':publisher' => array($publisher, PDO::PARAM_STR),
            ':editor' => array($editor, PDO::PARAM_STR),
            ':pdf' => array($pdf, PDO::PARAM_STR),
            ':date_display' => array($date_display, PDO::PARAM_STR),
            ':category_id' => array($category_id, PDO::PARAM_INT)      
        ));
    }
}
?>
