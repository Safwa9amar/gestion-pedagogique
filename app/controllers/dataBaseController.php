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
        $db = new DataBaseController();
        $stmt = $db->connection->prepare($query);
        if (!$stmt) return ;
        $stmt->execute();
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
        // get the first row from the table
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
    // getRowsByParam 
    public function getRowsByParam($table, $param, $qr)
    {
        $query = "SELECT * FROM $table WHERE $param = '$qr'";
        $rows = mysqli_fetch_all(mysqli_query($this->connection, $query), MYSQLI_ASSOC);
        return $rows;
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
    // getMaxId
    public function getMaxId($table)
    {
        $db = new DataBaseController();
        $query = "SELECT MAX(id) FROM $table";
        $result = mysqli_query($db->connection, $query);
        $row = mysqli_fetch_row($result);
        return $row[0];
    }
    // getCurrentSession
    public function getCurrentSession()
    {
        $db = new DataBaseController();
        // check if the session is in february or september
        $current_month = date('m') < 9 ? 2 : 9;
        $current_year = date('Y');
        $query = "SELECT * FROM `sessions` WHERE `year` = '$current_year' AND `month` = '$current_month'";
        $row = mysqli_fetch_assoc(mysqli_query($db->connection, $query));
        return $row;
    }

}