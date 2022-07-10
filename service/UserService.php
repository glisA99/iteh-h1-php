<?php

require "../database/DBBroker.php";

class UserService {
    
    private DBBroker $db_broker;

    public function __construct($dbb) {
        $this->db_broker = $dbb;
    }

    public function create($name,$surname,$username) {
        $query = "INSERT INTO user VALUES ('".$name."','".$surname."','".$username."')";
        $this->db_broker->execute($query);
    }

    public function getAll() {
        $query = "SELECT * FROM user";
        return $this->db_broker->load($query);
    }

    public function delete($user_id) {
        $query = "DELETE FROM user WHERE user_id=".$user_id;
        $this->db_broker->execute($query);
    }

    public function modify($user_id,$name,$surname,$username) {
        $query = "UPDATE user SET name='".$name."',surname='".$surname."',username='".$username."' WHERE user_id=".$user_id;
        $this->db_broker->execute($query);
    }

}

// create user service
$user_service = new UserService(DBBroker::getInstance());

?>