<?php
class AccountModel extends Model
{
    private $connection;
    function __construct()
    {
        $this->connection = $this->getConnection();
    }
    function getAccount($username, $password)
    {
        $sql = "SELECT * FROM account WHERE username='${username}' AND password='${password}'";
        $account = $this->find($this->connection, $sql);
        return $account;
    }
    function createAccount($account)
    {
        $name = $account['name'];
        $username = $account['username'];
        $password = md5($account['password']);
        $level = (int)$account['level'];
        $sql = "INSERT INTO account VALUES (NULL,'${name}','${username}','${password}',${level})";
        $result = $this->query($this->connection, $sql);
        return $result;
    }
}