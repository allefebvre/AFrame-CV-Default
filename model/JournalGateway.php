<?php

class JournalGateway {

    private $connection;

    public function __construct(Connection $con) {
        $this->connection = $con;
    }

    /**
     * Get all journals publication on database
     * @return array
     */
    public function getAllJournals(): array {
        $query = 'SELECT * FROM Journal ORDER BY date DESC;';
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }

    /**
     * 
     * @param int $id
     * @return array
     */
    public function getOneJournal(int $id): array {
        $query = 'SELECT * FROM Journal WHERE ID=:id;';
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
        return $this->connection->getResults();
    }

}

?>