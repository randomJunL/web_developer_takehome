<?php

class Database {
    private $db;
    private $host;
    private $port;
    private $user;
    private $password;
    private $dsn;
    private $pdoOptions;
    protected $connection;
    private $configName;


    public function __construct(string $configName, string $configPath){

        if($configName == "sqlite3"){
            $this->assignDSN($configName, $configPath);
        }
        else{
            $this->parseConfig($configName, $configPath);
            $this->assignDSN();
        }

        $this->assignPDOOptions();
        if(file_exists($configPath)){
            $this->dbopen();
        }
        else{
            throw new RuntimeException($configPath . " not found");
        }
    }


    protected function parseConfig(string $configName, string $configPath){
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

    protected function assignDSN($type = 'mysql', $dbFilePath = ""){
        if($type == "mysql"){
            $dsn = "mysql:";
            $dsn .= "host=" . $this->host . ";";
            $dsn .= "dbname=" . $this->db;
        }
        else{
            $dsn = "sqlite:";
            $dsn .= $dbFilePath;
        }

        $this->dsn = $dsn;
    }

    protected function assignPDOOptions(){
        $this->pdoOptions = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
    }

    protected function dbopen(){
        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->password, $this->pdoOptions);
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }

    protected function dbclose(){
        $this->connection = null;
    }

}