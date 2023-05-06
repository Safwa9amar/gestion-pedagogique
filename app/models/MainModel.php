<?php 
class MainModel extends DataBaseController{
    // db connection
    private $connection;
    // create connection from dataBaseController
    public function __construct(){
        $this->connection = new DataBaseController();
    }
    // create
    public function createRow($table, $params){
        $query = "INSERT INTO $table (";
        foreach ($params as $key => $value) {
            $query .= $key . ",";
        }
        $query = substr($query, 0, -1);
        $query .= ") VALUES (";
        foreach ($params as $key => $value) {
            $query .= "'" . $value . "',";
        }
        $query = substr($query, 0, -1);
        $query .= ")";
        return parent::execute($query) ? true : false;
    }

    // uodate
    public function updateRow($table, $id, $params){
        $query = "UPDATE $table SET ";
        foreach ($params as $key => $value) {
            $query .= $key . "='" . $value . "',";
        }
        $query = substr($query, 0, -1);
        $query .= " WHERE id = '$id'";
        $this->connection->execute($query);
    }

    // delete
    public function deleteRow($table, $id){
        $query = "DELETE FROM $table WHERE id = '$id'";
        $this->connection->execute($query);
    }

    // read
    public function read($table, $id){
        $query = "SELECT * FROM $table WHERE id = '$id'";
        $result = $this->connection->execute($query);
        return $result;
    }
    // getLatestRow
    public function getLatestRow($table){
        $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
        $result = $this->connection->execute($query);
        return $result;
    }
}