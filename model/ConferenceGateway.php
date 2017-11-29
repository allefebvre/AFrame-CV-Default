<?php
class ConferenceGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
    
    /**
     * Get all conferences publication on database
     * @return array
     */
    public function getAllConferences() :array {
        $query='SELECT * FROM Conference ORDER BY date DESC;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }
    
    /**
     * 
     * @param int $id
     * @return array
     */
    public function getOneConference(int $id) :array {
        $query='SELECT * FROM Conference WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        return $this->connection->getResults();
    }
    /**
     * 
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
     * @param string $category_id
     */
    public function updateById(int $id, string $reference, string $authors, string $title, string $date, string $journal, string $volume, string $number, string $pages, string $note, string $abstract, string $keywords, string $series, string $localite, string $publisher, string $editor, string $pdf, string $date_display, int $category_id){
        $query = 'UPDATE Conference SET reference=:reference, authors=:authors, title=:title, date=:date, journal=:journal, volume=:volume, number=:number, pages=:pages, note=:note, abstract=:abstract, keywords=:keywords, series=:series, localite=:localite, publisher=:publisher, editor=:editor, pdf=:pdf, date_display=:date_display, category_id=:category_id  WHERE ID=:id;';
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
    
    public function Insert(string $reference, string $authors, string $title, string $date, string $journal, string $volume, string $number, string $pages, string $note, string $abstract, string $keywords, string $series, string $localite, string $publisher, string $editor, string $pdf, string $date_display, int $category_id){
        $query = 'INSERT INTO Conference (`reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`)  VALUES (:reference, :authors, :title, :date, :journal, :volume, :number, :pages, :note, :abstract, :keywords, :series, :localite, :publisher, :editor, :pdf, :date_display, :category_id);';
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
