<?php
class database
{
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password= '';
    private $dbname = 'ajax_province';
    public $connection;

    public function __construct()
    {
        if(!$this->connection)
        {
            $this->connect();
        }
    }
    public function __destruct()
    {
        if($this->connection)
        {
            $this->disconnect();
        }
    }

    public function connect()
    {
        $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function disconnect()
    {
        $this->connection = NULL;
    }
}