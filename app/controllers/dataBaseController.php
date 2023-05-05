<?php
// crate class for database connection and queries from functions.php
class DataBaseController
{
    // database connection
    private $connection;

    // create connection
    public function __construct()
    {
        $this->connection = mysqli_connect(
            DB_HOST,
            DB_USER,
            DB_PASS,
            DB_NAME
        ) or die("Unable to connect!");
        // check if db is empty
        $check = mysqli_query($this->connection, "SELECT * FROM `config`");
        if (mysqli_num_rows($check) == 0) {
            // import sql file
            $sql = file_get_contents(DB_NAME . ".sql");
            if (mysqli_multi_query($this->connection, $sql)) {
                echo "SQL file imported successfully";
            } else {
                echo "Error importing SQL file: " . mysqli_error($this->connection);
            }
        }
    }
    // execute
    public function execute($query, $params = [])
    {
        print_r($params);
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
    // get all rows from table
    public function getAllRows($table, $order = 'id', $sort = 'DESC')
    {
        $query = "SELECT * FROM $table ORDER BY $order $sort";
        // fetch all rows from the table
        $rows = mysqli_fetch_all(mysqli_query($this->connection, $query), MYSQLI_ASSOC);
        return $rows;
    }
    // get row by id
    public function getRowById($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id = '$id'";
        $row = mysqli_fetch_assoc(mysqli_query($this->connection, $query));
        return $row;
    }
    // get row by param
    public function getRowByParam($table, $param, $qr)
    {
        $query = "SELECT * FROM $table WHERE $param = '$qr'";
        $row = mysqli_fetch_assoc(mysqli_query($this->connection, $query));
        return $row;
    }
    // insert row
    public function insertRow($table, $params)
    {
        $query = "INSERT INTO $table (";
        $query .= join(", ", array_keys($params));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($params));
        $query .= "')";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // delete row
    public function deleteRow($table, $id)
    {
        $query = "DELETE FROM $table WHERE id = '$id'";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    // update row
    public function updateRow($table, $id, $params)
    {
        $query = "UPDATE $table SET ";
        $query .= join(", ", array_map(function ($key, $value) {
            return "$key = '$value'";
        }, array_keys($params), array_values($params)));
        $query .= " WHERE id = '$id'";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    static function getRowByIdStatic($table, $id)
    {
        $db = new DataBaseController();
        $query = "SELECT * FROM $table WHERE id = '$id'";
        $row = mysqli_fetch_assoc(mysqli_query($db->connection, $query));
        return $row;
    }
    // getAllStatic
    static function getAllRowsStatic($table, $order = 'id', $sort = 'DESC')
    {
        $db = new DataBaseController();
        $query = "SELECT * FROM $table ORDER BY $order $sort";
        // fetch all rows from the table
        $rows = mysqli_fetch_all(mysqli_query($db->connection, $query), MYSQLI_ASSOC);
        return $rows;
    }


}
