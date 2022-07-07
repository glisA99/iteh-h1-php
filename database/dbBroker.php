<?php

class DBBroker {

  private $mysqli;
  private static $instance;

  private function __construct() {
    $this->mysqli = new mysqli('localhost', 'root', '', 'klubovi');
    $this->mysqli->set_charset("utf8");
  }

  public static function getInstance() {
    if (!isset(DBBroker::$instance)) {
        DBBroker::$instance = new DBBroker();
    }
    return DBBroker::$instance;
  }

  /**
   * Load only single record (row)
   */
  function loadSingle($query) {
    $result = $this->mysqli->query($query);
    if (!$result) {
      throw new Exception($this->mysqli->error);
    }
    return $result->fetch_assoc();
  }
  
  /**
   * Load all records that satisfy specified query
   */
  function load($query) {
    $result = $this->mysqli->query($query);
    if (!$result) {
      throw new Exception($this->mysqli->error);
    }
    $res = [];
    while ($row = $result->fetch_assoc()) {
      $res[] = $row;
    }
    return $res;
  }

  function execute($query) {
    $result = $this->mysqli->query($query);
    if (!$result) {
      throw new Exception($this->mysqli->error);
    }
  }
}
