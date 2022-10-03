<?php
/**
 * 
 * 
 * @author Matias Chaves <pamelotuda@email.com>
 * @link https://github.com/usr/repositorio.com
 * @version 0.1
 * @copyright 2022 El duo Dinamico
 * 
 */
class Db
{
    private $connection;
    /**
     * Establecer una conexion
     * @return connection
     */
    public function __construct()
    {
        try
        {
            $dsn = "mysql:dbname=" . DATABASE_NAME . ";host=" . SERVER_NAME;
            $this->connection = new PDO($dsn, USER_NAME, PASSWORD);
        }
        catch (PDOException $e)
        {
            die("Conexion Fallida");
        }
        return $this->connection;
    }
    /**
     * Prepara una query SQL
     *
     * @return object
     * @return int
     */
    public function prepare ($query)
    {
        return $this->connection->prepare($query);
    }
    /**
     * Ejecuta una SQL QUERY
     *
     * @param string $query
     * @return object
     */
    public function query($query)
    {
        return $this->connection->query($query);
    }
    /**
     * Cierra una conexion
     *
     * @return object 
     */
    public function close()
    {
        $this->connection=null;
    }
}

?>
