<?php
class ByDateGateway {
    
    private $connection;
    
    public function __construct(Connection $con) {
        $this->connection=$con;
    }
    
    /**
     * Get all Publications order by Date in Database
     * @return array
     */
    public function getAllByDates () :array {
        $query='DELETE FROM ByDate;';
        $this->connection->executeQuery($query);
        
        $query='INSERT INTO `ByDate`(`reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) SELECT `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`  From Other;';
        $this->connection->executeQuery($query);
        
        $query='INSERT INTO `ByDate`(`reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) SELECT `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id` FROM Conference;';
        $this->connection->executeQuery($query);
        
        $query='INSERT INTO `ByDate`(`reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id`) SELECT `reference`, `authors`, `title`, `date`, `journal`, `volume`, `number`, `pages`, `note`, `abstract`, `keywords`, `series`, `localite`, `publisher`, `editor`, `pdf`, `date_display`, `category_id` FROM Journal;';
        $this->connection->executeQuery($query);
        
        $query='SELECT * FROM ByDate ORDER BY date DESC;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }    
}
?>
