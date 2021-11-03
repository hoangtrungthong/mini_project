<?php
class DB
{
    public $conn;

    public function __construct()
    {
        $db_host = 'localhost';
        $db_user ='root';
        $db_pass = '';
        $db_name ='project1';
        $this->conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($this->conn->connect_errno) {
            die("connect error");
        }
    }

    public function get($table)
    {
        $sql = $sql = "SELECT * FROM $table";
        $query = mysqli_query($this->conn, $sql);

        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function selectSql($table, $key, $value)
    {
        $sql = "SELECT * FROM $table WHERE $key = '$value'";

        return mysqli_query($this->conn, $sql);
    }

    public function getOne($table, $key, $value)
    {
        $query = $this->selectSql($table, $key, $value);

        return mysqli_fetch_assoc($query);
    }

    public function getArticlesForUser($id)
    {
        $sql = "SELECT * 
                FROM articles 
                JOIN users 
                ON users.id = articles.user_id
                WHERE user_id = $id 
                ORDER BY id DESC";
        $query = mysqli_query($this->conn, $sql);

        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function getAll($table1, $table2, $key, $value)
    {
        $sql = "SELECT * FROM $table1 LEFT JOIN $table2 ON $key = $value ORDER BY id DESC";
        $query = mysqli_query($this->conn, $sql);

        return mysqli_fetch_all($query, MYSQLI_ASSOC); 
    }
    
    public function insert($table, $data)
    {
        $sql = "INSERT INTO $table ";
        $sql.= "(".implode(",",array_keys($data)).') ';
        $sql.= "VALUES ('".implode("','",array_values($data))."')";
        
        return mysqli_query($this->conn, $sql);
    }

    public function update($table, $data=[], $id, $value)
    {
        $sql = "";
        foreach ($data as $key=>$values) {
            $sql.= "$key = '$values',";
        }
        $sql = "UPDATE $table SET " . trim($sql,','). " WHERE $id = $value ";
        
        mysqli_query($this->conn, $sql);
    }

    public function delete($table, $id, $value)
    {
        $sql = "DELETE FROM $table WHERE $id = $value";
        mysqli_query($this->conn, $sql);
    }
}
