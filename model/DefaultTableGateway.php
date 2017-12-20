<?php

class DefaultTableGateway {

    private $connection;

    public function __construct(Connection $con) {
        $this->connection = $con;
    }

    /**
     * Get all Lines of a Table
     * @param string $tableName
     * @return array
     */
    public function getAllDefaultTables(string $tableName): array {
        $query = "DESC $tableName;";
        $this->connection->executeQuery($query);
        return $this->connection->getResults();
    }

    /**
     * Delete a Line of a Table by id
     * @param string $tableName
     * @param int $id
     */
    public function deleteDefaultLine(string $tableName, int $id) {
        $query = "DELETE FROM $tableName WHERE ID=:id;";
        $this->connection->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

}

?>