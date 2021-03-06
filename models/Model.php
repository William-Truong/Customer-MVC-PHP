<?php

namespace App\Models;

use mysqli;

class Model
{
    public function getConnection()
    {
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        return ($connection->connect_error) ? null : $connection;
    }

    public function query($connection, $sql = '')
    {
        $result = $connection->query($sql);
        return $result;
    }

    public function all($connection, $sql = '')
    {
        if ($connection) {
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return null;
            }
        } else
            return null;
    }

    public function find($connection, $sql)
    {
        if ($connection) {
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                return null;
            }
        } else
            return null;
    }
}