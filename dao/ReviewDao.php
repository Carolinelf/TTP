<?php

class ReviewDao {

    /** @var PDO */
    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    /**
     * Find all {@link Review}s by search criteria.
     * @return array array of {@link Review}s
     */
    public function find($sql) {
        $result = array();
        foreach ($this->query($sql) as $row) {
            $review = new Review();
            ReviewMapper::map($review, $row);
            $result[$review->getId()] = $review;
        }
        return $result;
    }

    /**
     * Find {@link Review} by identifier.
     * @return Review Review or <i>null</i> if not found
     */
    public function findById($id) {
        $row = $this->query('SELECT id, coffee_type, comment, user_id, cafe_id, status rating FROM review WHERE status != "deleted" and id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $review = new Review();
        ReviewMapper::map($review, $row);
        return $review;
    }

    /**
     * Save {@link Review}.
     * @param Review $review {@link Review} to be saved
     * @return Review saved {@link Review} instance
     */
    public function save(Review $review) {
        if ($review->getId() === null) {
            return $this->insert($review);
        }
        return $this->update($review);
    }

    /**
     * Delete {@link Review} by identifier.
     * @param int $id {@link Review} identifier
     * @return bool <i>true</i> on success, <i>false</i> otherwise
     */
    public function delete($id) {
        $sql = '
            UPDATE review SET
                status = :status
            WHERE
                id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':status' => 'deleted',
            ':id' => $id
        ));
        return $statement->rowCount() == 1;
    }

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
     * @return Review
     * @throws Exception
     */
    private function insert(Review $review) {
        //   $now = new DateTime();
        $review->setId(null);
        $review->setStatus('pending');
        $sql = '
            INSERT INTO review (id, coffee_type, comment, user_id, cafe_id, status, rating)
            VALUES (:id, :coffee_type, :comment, :user_id, :cafe_id, :status, :rating)';
        return $this->execute($sql, $review);
    }

    /**
     * @return Review
     * @throws Exception
     */
    private function update(Review $review) {
        //$review->setDate(new DateTime());
        $sql = '
            UPDATE review SET
                id = :id,
                coffee_type = :coffee_type,
                comment = :comment,
                cafe_id = :cafe_id,
                rating = :rating
            WHERE
                id = :id';

        return $this->execute($sql, $review);
    }

    /**
     * @return Review
     * @throws Exception
     */
    private function execute($sql, Review $review) {
        $statement = $this->getDb()->prepare($sql);

        $this->executeStatement($statement, $this->getParams($review));
        if ($review->getId()) {
            return $this->findById($this->getDb()->lastInsertId());
        }
//        if (!$statement->rowCount()) {
//            throw new NotFoundException('Review with ID "' . $review->getId() . '" does not exist.');
//        }

        return $review;
    }

    private function getParams(Review $review) {
        $params = array(
            ':id' => $review->getId(),
            ':coffee_type' => $review->getCoffeeType(),
            ':comment' => $review->getComment(),
            ':user_id' => $review->getUserId(),
            ':cafe_id' => $review->getCafeId(),
            ':status' => $review->getStatus(),
            ':rating' => $review->getRating()
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
        // Review log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }

//    private static function formatDateTime(DateTime $date) { 
//        return $date->format(DateTime::ISO8601);
//        
//    }
}
