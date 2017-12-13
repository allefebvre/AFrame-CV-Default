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
}

