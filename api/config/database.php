<?php
class Database{
 
    //  database credentials
    //private $host = "localhost";
    //private $db_name = "virtual-university";
    //private $username = "root";
    //private $password = "";
    //public $conn;
 
    // get database connection
    private $db_host = 'k3beta.c7lkgbzlct6d.ap-south-1.rds.amazonaws.com';
    private $db_user = 'root';
    private $db_password = 'maV01X615';
    private $db_database = 'k3beta';
    private $db_options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::MYSQL_ATTR_SSL_CA => '/var/tmp/rds-ca-2019-root.pem',
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,);


    public function getConnection(){
 
        $this->conn = null;
        try{
            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            //$this->conn->exec("set names utf8");
            $conn = new PDO("mysql:host=$db_host;port=3306;dbname=$db_database", $db_user, $db_password, $db_options);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        date_default_timezone_set("Asia/Kolkata");
        return $this->conn;
    }
}
