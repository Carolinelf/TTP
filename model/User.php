<?php

class User {
    
    private $id;
    private $username;
    private $password;
    private $email;
    private $privilege;
    private $status;
    
    function getStatus() {
        return $this->status;
    }

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getPrivilege() {
        return $this->privilege;
    }
    function setStatus($status) {
        $this->status = $status;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPrivilege($privilege) {
        $this->privilege = $privilege;
    }
}