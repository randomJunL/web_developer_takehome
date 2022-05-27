<?php

require_once('model.php');
require_once('view.php');


class RequesterController{

    private $requester;
    private $html;
    private $errors;

    public function __construct($configName, $configPath){


        $this->requester = new Requester($configName, $configPath);
        $this->html = new Html();
        $this->errors = [];

        $requestMethod = $_SERVER['REQUEST_METHOD'];
        if($requestMethod == "GET"){
            $this->index();
        }elseif ($requestMethod == "POST"){
            $this->addEntry();
        }
    }

    public function index(){
        $entries = $this->getEntries();

        $html = $this->html->getForm($this->errors);
        $html .= $this->html->getListOfEntries($entries);

        echo $html;

    }



    protected function getEntries(){
        return $this->requester->getAllEntries();
    }


    protected function addEntry(){
        if(empty(trim($_POST['firstname']))){
            $this->errors['firstname'] = "First Name is required";
        }
        if (empty(trim($_POST['lastname']))){
            $this->errors['lastname'] = "Last Name is required";
        }
        if (empty(trim($_POST['email']))){
            $this->errors['email'] = "Email is required";
        }


        $fname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        $lname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if(!$this->checkErrors()){
            try{
                $this->requester->addEntry($fname, $lname, $email);
            }
            catch (RuntimeException $e){
                $this->errors['email'] = $e->getMessage();
            }

        }

        $this->index();

    }

    protected function checkErrors():bool {
        $hasError = false;
        foreach ($this->errors as $k => $v){
            $hasError = $hasError || isset($this->errors[$k]);
        }

        return $hasError;
    }
}