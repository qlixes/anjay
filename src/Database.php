<?php

// using PDO
class Database
{
    var $pdo;
    
    function connect($config = array())
    {
        try
        {
            // var_dump($config);
            $this->pdo = new PDO(
                $config['class'] . ":"
                . "host=" . $config['host'] . ";"
                . "port=" . $config['port'] .  ";"
                . "charset=" . $config['charset'] . ";" 
                . "dbname=" . $config['db'],
                $config['user'],
                $config['pass']
                // array(
                //     PDO::ATTR_EMULATE_PREPARES=>false,
                //     PDO::MYSQL_ATTR_DIRECT_QUERY=>false,
                //     PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
                // )
            );

            // $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    function read($sql, $params = array())
    {
        $stmt = $this->pdo->prepare($sql);

        $result = $stmt->execute($params);

        $this->status = ($result);

        // $this->result = ($stmt->rowCount() > 1) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : $stmt->fetch(PDO::FETCH_ASSOC);
        $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this;
    }

    function edit($sql, $params = array())
    {
        $stmt = $this->pdo->prepare($sql);

        $result = $stmt->execute($params);

        $this->status = ($result);

        return $this;
    }

    function status()
    {
        return $this->status;
    }

    function results()
    {
        return $this->result;
    }

    function insertId()
    {
        return $this->pdo->lastInsertId();
    }
}