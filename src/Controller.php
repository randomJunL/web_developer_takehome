<?php

require("Requester.php");
require('Html.php');

class Controller {

    private $requester;
    private $html;
    //private $entries;

    public function __construct($configName, $configPath) {
        $this->requester= new Requester($configName, $configPath);
        $this->html = new Html();
        

        $requestMethod = $_SERVER['REQUEST_METHOD'];
        if($requestMethod == "GET") {
            $this->deleteData();   
            $this->index();
        }
        if ($requestMethod == "POST"){
            $this->insertData();
        }
    }

    public function index(){
        $entries = $this->getEntries();

        $html = $this->html->getForm();
        $html .= $this->html->getListOfEntries($entries);

        echo $html;
    }

    public function insertData() {
        
        if(empty($_POST['first_name'])){
            //throw new RuntimeException("First name is required");
            echo "First name is required";
        }elseif (empty($_POST['last_name'])){
            //throw new RuntimeException("Last name is required");
            echo "Last name is required";
        }elseif (empty($_POST['email'])){
            //throw new RuntimeException("Email is required");
            echo "Email is required";
        } else {
            $fname = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
            $lname = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        }

        
        try{
            $this->requester->insertRequester($fname,$lname,$email);
        }
        catch (RuntimeException $e){
            echo $e->getMessage();
        }  
        $this->index();
    }

    public function getEntries(){
        $this-> entries = $this->requester->getWholeRequester();
        
        return $this -> entries;
    }

    public function deleteData() {
        if (isset($_GET['delete_key'])) {
            $delete_key = filter_var($_GET['delete_key'], FILTER_SANITIZE_EMAIL);
            //echo $delete_key;
            $this ->requester->deleteRequester($delete_key);
        }
    }


};

?>