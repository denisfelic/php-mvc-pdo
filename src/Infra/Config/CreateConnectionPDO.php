<?php


namespace Denis\MVC\Infra\Config;


use PDO;
use PDOException;

/**
 * Class CreateConnectionPDO
 * @package Denis\MVC\Infra\Config
 */
class CreateConnectionPDO
{
    

    /**
     * @return PDO
     * @throws \Exception | PDOException
     */
    public static function mysql(): PDO
    {
        define("PORT", "3306");
        define("DB", "mvc_pdo");
        define("END", "127.0.0.1");
        define("USER", "root");
        define("PASS", "");
        
        
        try {
            $connection = new PDO('mysql:host=' . END . ';port=' . PORT . ';dbname=' . DB . ';charset=utf8', USER, PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // TODO: Implementar uma página de erro por erro conexão com o banco de dados ou algo do tipo
            // TODO: Adicionar um log
            echo "Erro ao se conectar com o banco de dados.\n<br>";
            echo $e->getMessage();
            die();
        }
        return $connection;
    }


}