<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'diplom');

class Database
{
    private static $connection;

    private static function initConnection()
    {
        static::$connection = new \PDO(
            'mysql:dbname='.DB_NAME.';host='.DB_HOST,
            DB_USER,
            DB_PASSWORD
        );

        static::$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

    private static function getConnection()
    {
        if (empty(static::$connection)) {

            static::initConnection();
        }

        return static::$connection;
    }

    public static function select(string $table, string $selector = '*', string $conditionTemplate = '', array $embeddedData = [])
    {
        $connection = static::getConnection();

        $query = 'SELECT ' . $selector . ' FROM ' . $table;

        $query .= ($conditionTemplate != '') ? (' WHERE ' . $conditionTemplate) : '';

//        echo $query;

        $sth = $connection->prepare($query);

        foreach ($embeddedData as $data)
        {
            $sth->bindParam(...$data);
        }

        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function insert(string $table, string $valuesTemplate, array $embeddedData = [])
    {
        $connection = static::getConnection();

        $query = 'INSERT INTO ' . $table . ' VALUES (' . $valuesTemplate . ')';

//        echo $query;

        $sth = $connection->prepare($query);

        foreach ($embeddedData as $data)
        {
            $sth->bindParam(...$data);
        }

        $sth->execute();
    }

    public static function update(string $table, string $settersTemplate, string $conditionTemplate = '', array $embeddedData = [])
    {
        $connection = static::getConnection();

        $query = 'UPDATE ' . $table . ' SET ' . $settersTemplate;

        $query .= ($conditionTemplate != '') ? (' WHERE ' . $conditionTemplate) : '';

        $sth = $connection->prepare($query);

        foreach ($embeddedData as $data)
        {
            $sth->bindParam(...$data);
        }

        if ( $sth->execute())
        {
            return ['code' => 200];
        }
        else
        {
            return ['code' => 500];
        }
    }

    public static function delete(string $table, string $conditionTemplate = '', array $embeddedData = [])
    {

        $connection = static::getConnection();

        $query = 'DELETE FROM ' . $table;

        $query .= ($conditionTemplate != '') ? (' WHERE ' . $conditionTemplate) : '';

//        echo $query;

        $sth = $connection->prepare($query);

        foreach ($embeddedData as $data)
        {
            $sth->bindParam(...$data);
        }

        if($sth->execute())
        {
            return ['code' => 200];
        }
        else
        {
            return ['code' => 500];
        }
    }
}