<?php

class Database {
    private $dbname;
    private $dbhost;
    private $dbport;
    private $user;
    private $password;
    private $dsn;
    private $pdoOptions;
    protected $connection;


    public function __construct($configName, $configPath){

        if($configName == "sqlite"){
            $this->assignDSN($configName,$configPath);
        } else if ($configName == "mysql"){
            $this->parseConfig($configName, $configPath);
            $this->assignDSN($configName,$configPath);
        }

        $this->assignPDOOptions();
        if(file_exists($configPath)){
            $this->db_open();
        }
        else{
            throw new RuntimeException($configPath . " not found");
        }

    }

    protected function parseConfig($configName, $configPath){
        $path = __DIR__ . "/../../" . $configPath;
        if(file_exists($path))
        {
            $configsArray = parse_ini_file($path);
            $parametersArray = $configsArray[$configName];
            foreach ($parametersArray as $k => $v)
            {
                $this->$k = $v;
            }
        }
        else
        {
            throw new RuntimeException($path . " cannot be found");
        }
    }

    protected function db_open() {
        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->password, $this->pdoOptions);
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }

    protected function db_close() {
        $this->connection = null;
    }

    protected function assignDSN($configName,$dbFilePath){
        if ($configName== "mysql") {
            $dsn = $configName.": host=". $this->dbhost. ";"."dbname=". $this->dbname;
        }
        else if ($configName == "sqlite") {
            $dsn = $configName.":".$dbFilePath;
        }
        
        $this->dsn = $dsn;
    }

    protected function assignPDOOptions(){
        $this->pdoOptions = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
    }
}
?>

