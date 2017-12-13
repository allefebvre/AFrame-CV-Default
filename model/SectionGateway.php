<?php

class SectionGateway {
    
    private $connection;
    
    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }
    
    /**
     * Get all Sections in Database
     * @return array
     */
    public function getAllSections() :array {
        $query='SELECT * FROM section;';
        $this->connection->executeQuery($query);
        
        return $this->connection->getResults();
    }
     
    /**
     * Get a Section by title in Database
     * @param string $title
     * @return array
     */
    public function getSectionByTitle(string $title) :array {
        $query='SELECT * FROM section WHERE title=:title;';
        $this->connection->executeQuery($query, array(
            ':title' => array($title, PDO::PARAM_STR)
        ));
        
        return $this->connection->getResults()[0];
    }
    
    /**
     * Get a Section by id in Database
     * @param int $id
     * @return array
     */
    public function getSectionById(int $id) :array {
        $query='SELECT * FROM section WHERE id=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults()[0];
    }
}

