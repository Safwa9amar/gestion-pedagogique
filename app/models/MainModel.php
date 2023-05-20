<?php
class MainModel extends DataBaseController
{
    // db connection
    private $connection;
    // create connection from dataBaseController
    public function __construct()
    {
        parent::__construct();
        $this->connection = $this->getConnection();
    }
    // create
    public function createRow($table, $params)
    {

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
    public function updateRow($table, $id, $params)
    {
        // ignore special characters from params array
        $params = array_map(function ($value) {
            return mysqli_real_escape_string($this->connection, $value);
        }, $params);
        $query = "UPDATE $table SET ";
        foreach ($params as $key => $value) {
            $query .= $key . "='" . $value . "',";
        }
        $query = substr($query, 0, -1);
        $query .= " WHERE id = '$id'";
        // ignore special characters
        $query = htmlspecialchars($query);
        return $this->execute($query) ? true : false;
    }

    // delete
    // delete by param
    public function deleteRowByParam($table, $param, $qr)
    {
        $query = "DELETE FROM $table WHERE $param = '$qr'";
        $this->execute($query);
    }

    // read
    public function read($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id = '$id'";
        $result = $this->execute($query);
        return $result;
    }
    // getLatestRow
    public function getLatestRow($table)
    {
        $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
        $result = $this->execute($query);
        return $result;
    }
    // executeSqlCode
    public function executeSqlCode($query)
    {
        $result = $this->execute($query);
        return $result;
    }
}