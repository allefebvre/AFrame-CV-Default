<?php

class ResumeGateway {
    
    private $connection;
    
    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }
    
    /**
     * Get a Resume by sectionId in Database
     * @param int $sectionId
     * @return array
     */
    public function getResumeBySectionId(int $sectionId) :array {
        $query='SELECT * FROM resume WHERE section_id=:sectionId;';
        $this->connection->executeQuery($query, array(
            ':sectionId' => array($sectionId, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults()[0];
    }
    
    /**
     * Count Resume by sectionId in Database
     * @param int $sectionId
     * @return int
     */
    public function countResumeBySectionId(int $sectionId) :int {
        $query='SELECT COUNT(*) FROM resume WHERE section_id=:sectionId;';
        $this->connection->executeQuery($query, array(
            ':sectionId' => array($sectionId, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults()[0][0];
    }
    
    /**
     * Get a Resume by id in Database
     * @param int $id
     * @return array
     */
    public function getResumeById(int $id) :array {
        $query='SELECT * FROM resume WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        
        return $this->connection->getResults()[0];
    }
    
    /**
     * Update a Resume by id in Database
     * @param int $id
     * @param string $content
     */
    public function updateById(int $id, string $content) {
        $today = date("Y-m-d");
        $query='UPDATE resume SET date_modification=:dateModification, content=:content WHERE id=:id;';
        $this->connection->executeQuery($query, array(
            ':dateModification' => array($today, PDO::PARAM_STR),
            ':content' => array($content, PDO::PARAM_STR),
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }
    
    /**
     * Insert a Resume in Database
     * @param string $content
     * @param int $sectionId 
     */
    public function insert(string $content, int $sectionId) {
        $today = date("Y-m-d");
        $query = 'INSERT INTO resume (`date_creation`, `date_modification`, `content`, `section_id`)  VALUES (:dateCreation, :dateModification, :content, :sectionId);';
        $this->connection->executeQuery($query, array(
            ':dateCreation' => array($today, PDO::PARAM_STR),
            ':dateModification' => array($today, PDO::PARAM_STR),
            ':content' => array($content, PDO::PARAM_STR),
            ':sectionId' => array($sectionId, PDO::PARAM_INT)
        ));
    }
}

