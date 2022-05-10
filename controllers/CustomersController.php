<?php


class CustomersController extends Controller
{
    private $method;
    private $model;
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->model = $this->loadModel('CustomerModel');
    }
    public function index()
    {
        // Authentication
        if (Role::is_admin()) {
            $customers = array();
            if ($this->method == 'POST') {
                $keyword = Helper::input_post('keyword');
                if ($keyword) {
                    $customers = $this->model->searchCustomer($keyword);
                }
            } else {
                $customers = $this->model->getCustomers();
            }
            $this->view('customer/list', ['customers' => $customers]);
        } else {
            $message = "You are not an Admin and access denied!";
            $this->view('dashboard', ['message' => $message]);
        }
    }
    public function create()
    {
        if (Role::is_admin()) {
            if ($this->method == 'GET') {
                $this->view('customer/create');
            } elseif ($this->method == 'POST') {
                $result = $this->model->createCustomer($_POST);
                if ($result)
                    Helper::redirect('Customers');
                else
                    echo 'ERROR';
            }
        } else {
            $message = "You are not an Admin and access denied!";
            $this->view('dashboard', ['message' => $message]);
        }
    }
    public function edit($id)
    {
        if (Role::is_admin()) {
            if ($this->method == 'GET') {
                $customer = $this->model->getCustomer($id);
                $this->view('customer/edit', ['customer' => $customer]);
            } elseif ($this->method == 'POST') {
                $result = $this->model->editCustomer($_POST);
                if ($result)
                    Helper::redirect('Customers');
                else
                    echo 'Error';
            }
        } else {
            $message = "You are not an Admin and access denied!";
            $this->view('dashboard', ['message' => $message]);
        }
    }
    public function delete($id)
    {
        if (Role::is_admin()) {
            $result = $this->model->deleteCustomer($id);
            Helper::redirect('Customers');
        } else {
            $message = "You are not an Admin and access denied!";
            $this->view('dashboard', ['message' => $message]);
        }
    }
}