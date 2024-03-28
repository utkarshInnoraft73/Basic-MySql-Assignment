<?php

require_once("./vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "./../");
$dotenv->load();

/**
 * Class to perform the operation related to databses.
 */
class Db
{
    /**
     * To Stores the database name.
     * 
     * @var string $database;
     *   Database name.
     */
    private $database;

    /**
     * To stores the use name.
     * 
     * @var string $username;
     *   Username.
     */
    private $username;

    /**
     * To stores the password.
     * 
     * @var string $password;
     *   Password.
     */
    private $password;

    /**
     * To stores the host.
     * 
     * @var string $host;
     *   Host.
     */
    private $host;

    private $conn;

    /**
     * Constructor to set the values.
     * 
     * @var string $database;
     *   Database name;
     * @var string $username;
     *   User name.
     * @var string $host;
     *   Host name.
     * @var string $password.
     *   Password.
     */
    function __construct()
    {
        $this->database = $_ENV['DATABASE'];
        $this->username =  $_ENV['USERNAME'];
        $this->password = $_ENV['PASSWORD'];
        $this->host = $_ENV['HOSTNAME'];
    }

    /**
     * To connect the database.
     * 
     * Description:
     *   It connect the database with php by PDO.
     */

    function connectDB()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * To run select Query.
     * 
     * @param string $query;
     *   query to run.
     * 
     * @return array $result;
     *   It return the data in the form of associative array.
     */
    function runQuery($query)
    {
        try {
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Error for selecting" . $e->getMessage();
        }
    }

    /**
     * To run the insert query.
     * 
     * @param string $query;
     *   The query to run.
     */
    function insertData($query)
    {
        try {
            $statement = $this->conn->prepare($query);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
            // Or you can log the error, throw a new exception, or handle it in any other appropriate way.
        }
    }
}
