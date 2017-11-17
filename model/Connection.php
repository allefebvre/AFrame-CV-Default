
<?php

class Connection extends PDO {

    private $stmt;

    public function __construct(string $dsn, string $username, string $passwd) {
            parent::__construct($dsn, $username, $passwd);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Execute a query on database
     * @param string $query
     * @param array $parameters
     * @return bool
     */
    public function executeQuery(string $query, array $parameters = []) :bool {
            $this->stmt = parent::prepare($query);

            foreach ($parameters as $name => $value) {

                $this->stmt->bindValue($name, $value[0], $value[1]);
            }
            return $this->stmt->execute();
    }

    /**
     * Get results of an executed query
     * @return array
     */
    public function getResults() :array {
            return $this->stmt->fetchAll();
    }

    /**
     * Count rows of an executed query
     * @return array
     */
    public function getNbResults() :array {
            return $this->stmt->rowCount();
    }
}

?>
