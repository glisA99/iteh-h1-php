<?php

require "./database/DBBroker.php";

class GistService {

    private DBBroker $db_broker;

    public function __construct($dbb) {
        $this->db_broker = $dbb;
    }

    private function loadAuthor($gist) {
        $user_id = $gist["author_id"];
        $query = "SELECT * FROM user WHERE user_id=".$user_id;
        $gist["author"] = $this->db_broker->loadSingle($query);
        return $gist;
    }

    public function getAll() {
        $query = "SELECT * FROM gist";
        return $this->db_broker->load($query);
    }

    public function getOne() {
        $query = "SELECT * FROM gist";
        $gist = $this->db_broker->loadSingle($query);
        if(!isset($gist)) {
            throw new Error("There are not gists available");
        }
        return $this->loadAuthor($gist);
    }

    public function delete($gist_id) {
        $query = "DELETE FROM gist WHERE gist_id=".$gist_id;
        $this->db_broker->execute($query);
    }

    public function changeAuthor($gist_id,$author_id) {
        $query = "UPDATE gist SET author_id='".$author_id."' WHERE gist_id=".$gist_id;
        $this->db_broker->execute($query);
    }

}

// create gist service
$gist_service = new GistService(DBBroker::getInstance()); 

?>
