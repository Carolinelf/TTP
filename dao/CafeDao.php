<?php

class CafeDao {

    /** @var PDO */
    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    /**
     * Find all {@link Cafe}s by search criteria.
     * @return array array of {@link Cafe}s
     */
    public function find($sql) {
        $result = array();
        foreach ($this->query($sql) as $row) {
            $cafe = new Cafe();
            CafeMapper::map($cafe, $row);
            $result[$cafe->getId()] = $cafe;
        }
        return $result;
    }

    /**
     * Find {@link Cafe} by identifier.
     * @return Cafe Cafe or <i>null</i> if not found
     */
    public function findById($id) {
        $row = $this->query('SELECT id, name, location, overview, average_rating FROM cafe WHERE  id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $cafe = new Cafe();
        CafeMapper::map($cafe, $row);
        return $cafe;
    }
    
    /**
     * Save {@link Cafe}.
     * @param Cafe $cafe {@link Cafe} to be saved
     * @return Cafe saved {@link Cafe} instance
     */
    public function save(Cafe $cafe) {
        if ($cafe->getId() === null) {
            return $this->insert($cafe);
        }
        return $this->update($cafe);
    }

    /**
     * Delete {@link Cafe} by identifier.
     * @param int $id {@link Cafe} identifier
     * @return bool <i>true</i> on success, <i>false</i> otherwise
     */
//    public function delete($id) {
//        $sql = '
//            UPDATE cafes SET
//                status = :status
//            WHERE
//                id = :id';
//        $statement = $this->getDb()->prepare($sql);
//        $this->executeStatement($statement, array(
//            ':status' => 'deleted',
//            ':id' => $id,
//        ));
//        return $statement->rowCount() == 1;
//    }
    /**
     * @return PDO
     */
    private function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig("db");
        try {
            $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
        } catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        return $this->db;
    }

    /**
     * @return Cafe
     * @throws Exception
     */
    private function insert(Cafe $cafe) {
        $cafe->setId(null);
        $sql = '
            INSERT INTO cafe (id, name, location, overview, average_rating)
                VALUES (:id, :name, :location, :overview, :average_rating)';
        return $this->execute($sql, $cafe);
    }

    /**
     * @return Cafe
     * @throws Exception
     */
    private function update(Cafe $cafe) {
        $sql = 'UPDATE cafe SET
                id = :id,
                name = :name,
                location = :location,
                overview = :overview,
                average_rating = :average_rating
            WHERE
                id = :id';
        return $this->execute($sql, $cafe);
    }

    /**
     * @return Cafe
     * @throws Exception
     */
    private function execute($sql, Cafe $cafe) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($cafe));
        if (!$cafe->getId()) {
            return $this->findById($this->getDb()->lastInsertId());
        }
//        if (!$statement->rowCount()) {
//            throw new NotFoundException('Cafe with ID "' . $cafe->getId() . '" does not exist.');
//        }
        return $cafe;
    }

    private function getParams(Cafe $cafe) {
        $params = array(
            ':id' => $cafe->getId(),
            ':name' => $cafe->getName(),
            ':location' => $cafe->getLocation(),
            ':overview' => $cafe->getOverview(),
            ':average_rating' => $cafe->getAverageRating()
        );

        return $params;
    }

    private function executeStatement(PDOStatement $statement, array $params) {
        if (!$statement->execute($params)) {
            self::throwDbError($this->getDb()->errorInfo());
        }
    }

    /**
     * @return PDOStatement
     */
    private function query($sql) {
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            self::throwDbError($this->getDb()->errorInfo());
        }
        return $statement;
    }

    private static function throwDbError(array $errorInfo) {
        // TODO log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }

}
