<?php
class Database {
    public $connection;
    public function __construct($config)
    {

        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->connection = new PDO($dsn,$config['user'],$config['dbpass'],[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query,$params=[])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }
}
