<?php

class UserDao {
    
    /** @var PDO */
    private $db = null;
    
    public function __destruct() {
        // close db connection
        $this->db = null;
    }
    /**
     * Find all {@link User}s by search criteria.
     * @return array array of {@link User}s
     */
    public function find($sql) {
        $result = array();
        foreach ($this->query($sql) as $row) {
            $user = new User();
            UserMapper::map($user, $row);
            $result[$user->getId()] = $user;
        }

        return $result;
    }
    /**
     * Find {@link User} by identifier.
     * @return User User or <i>null</i> if not found
     */
    public function findById($id) {
        $row = $this->query('SELECT id, username, password, email, privilege, status FROM users WHERE status != "deleted" AND id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $user = new User();
        UserMapper::map($user, $row);
        return $user;
    }
    public function findByCredentials($username, $password) {
        $row = $this->query("SELECT id, username, password, email, privilege, status FROM users WHERE username = '$username' AND password = '$password'")->fetch();
        if (!$row) {
            return null;
        }
        $user = new User();
        UserMapper::map($user, $row);
        return $user;
  }
    /**
     * Save {@link User}.
     * @param User $user {@link User} to be saved
     * @return User saved {@link User} instance
     */
    public function save(User $user) {
        if ($user->getId() === null) {
            return $this->insert($user);
        }
        return $this->update($user);
    }
    /**
     * Delete {@link User} by identifier.
     * @param int $id {@link User} identifier
     * @return bool <i>true</i> on success, <i>false</i> otherwise
     */
    public function delete($id) {  
        $sql = '
            UPDATE users SET
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
     * @return User
     * @throws Exception
     */
    private function insert(User $user) {
        //$now = new DateTime();
        $user->setId(null);
        $user->setStatus('pending');
        $user->setPrivilege('user');
        $sql = '
            INSERT INTO users (id, username, password, email, privilege, status)
                VALUES (:id, :username, :password, :email, :privilege, :status)';
        return $this->execute($sql, $user);
    }
    /**
     * @return User
     * @throws Exception
     */
    private function update(User $user) {
        $sql = '
            UPDATE users SET
                id = :id,
                username = :username,
                password = :password,
                email = :email,
                privilege = :privilege,
                status = :status
            WHERE
                id = :id';
        return $this->execute($sql, $user);
    }
    /**
     * @return User
     * @throws Exception
     */
    private function execute($sql, User $user) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($user));
        if (!$user->getId()) {
            return $this->findById($this->getDb()->lastInsertId());
        }

        return $user;
    }
    private function getParams(User $user) { 
        $params = array(
            ':id' => $user->getId(),
            ':username' => $user->getUsername(),
            ':password' => $user->getPassword(),
            ':email' => $user->getEmail(),
            ':privilege' => $user->getPrivilege(),
            ':status' => $user->getStatus()
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
//    private static function formatDateTime(DateTime $date) {
//        return $date->format(DateTime::ISO8601);
//    }
}