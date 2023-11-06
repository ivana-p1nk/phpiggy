<?php

declare(strict_types=1);

namespace Framework;

use PDO, PDOExpcetion;

class Database
{

    private PDO $connection;


    public function __construct(
        string $driver,
        array $config,
        string $username,
        string $password
        )
        {

        $config = http_build_query(data: $config, arg_separator: ';');

        $dsn ="{$driver}:{$config}";

        try{
           $this->connection = new PDO($dsn, $username, $password);
        } catch (PDOExpcetion $e){
            die("unable to connect to database");
        }
    }

    public function query(string $query) {
        $this->connection->query($query);
    }

}