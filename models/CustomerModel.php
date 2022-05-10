<?php

namespace App\Models;

class CustomerModel extends Model
{
    private $connection;
    public function __construct()
    {
        $this->connection = $this->getConnection();
    }
    public function getCustomers()
    {
        $sql = "SELECT * FROM customer";
        $customers = $this->all($this->connection, $sql);
        return $customers;
    }
    public function getCustomer($id)
    {
        $sql = "SELECT * FROM customer WHERE id=${id}";
        $customer = $this->find($this->connection, $sql);
        return $customer;
    }
    public function createCustomer($customer)
    {
        $name = $customer['name'];
        $email = $customer['email'];
        $created_date = date("Y-m-d");
        $sql = "INSERT INTO customer VALUES (NULL,'${name}','${email}','${created_date}',NULL)";
        $result = $this->query($this->connection, $sql);
        return $result;
    }
    public function editCustomer($customer)
    {
        $id = $customer['id'];
        $name = $customer['name'];
        $email = $customer['email'];
        $updated_date = date("Y-m-d");
        $sql = "UPDATE customer SET name='${name}',email='${email}',updated_date='${updated_date}' WHERE id=${id}";
        $result = $this->query($this->connection, $sql);
        return $result;
    }
    public function deleteCustomer($id)
    {
        $sql = "DELETE FROM customer WHERE id=${id}";
        $result = $this->query($this->connection, $sql);
        return $result;
    }
    public function searchCustomer($keyword)
    {
        $sql = "SELECT * FROM customer WHERE name LIKE '%${keyword}%'";
        $customers = $this->all($this->connection, $sql);
        return $customers;
    }
}