<?php
namespace App;

use PDO;
use PDOException;

include(__DIR__.'/../config.php');
class Database
{
    private $dbname;
    private $dbhost;
    private $dbuser;
    private $dbpassword;
    private $dbport;
    private $dbc;
    function __construct()
    {
        $this->dbhost = &$GLOBALS['DB_HOST'];  
        $this->dbuser = &$GLOBALS['DB_USER'];  
        $this->dbpassword = &$GLOBALS['DB_PASS'];  
        $this->dbname = &$GLOBALS['DB_NAME'];  
        $this->dbport = &$GLOBALS['DB_PORT'];  

        try {
            $dsn = "mysql:host=" . $this->dbhost . ";port=" . $this->dbport . ";dbname=" . $this->dbname;
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->dbc = new PDO($dsn, $this->dbuser, $this->dbpassword, $options);
        } catch (PDOException $exc) {
            echo "Hiba: " . $exc->getMessage();
        }
    }
    public function read(string $table)
    {
        $sql = "SELECT * FROM " . $table;
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}