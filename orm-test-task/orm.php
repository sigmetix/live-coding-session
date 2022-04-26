<?php

class DB {
    public function connectMySql(): CRUDMySql
    {
        return new CRUDMySql();
    }

    public function connectSqLite(): CRUDSqLite
    {
        return new CRUDSqLite();
    }
}

class DBFactory
{
    public static function build()
    {
        $db = 'mysql';
        // grab from confifg

        switch ($db) {
            case 'mysql':
                return new (DB())->connectMySql();
            case 'sqlite':
                return new (DB())->connectSqLite();
        }
    }
}

class CRUDSqLite
{
    public function insert(string $tableName, ?array $data)
    {
        $jsonEncodedData = json_encode($data);
        echo "Insert Into table [{$tableName}] {$jsonEncodedData} CRUDSqLite" . PHP_EOL;
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

class CRUDMySql
{
    public function insert(string $tableName, array $data)
    {
        $jsonEncodedData = json_encode($data);
        echo "Insert Into table [{$tableName}] {$jsonEncodedData} CRUDMySql" . PHP_EOL;
    }

    public function update(string $tableName, array $data)
    {

    }

    public function delete()
    {

    }

    public function select()
    {

    }
}

class TestController
{
    public function crudMysql()
    {
        $tableName = 'users';
        $data = [
            'name' => 'Mary',
            'address' => '444 S.Union St'
        ];

        $orm = DBFactory::build();
        $orm->insert($tableName, $data);

    }

    public function crudSQLite()
    {
        $tableName = 'users';
        $data = [
            'name' => 'Mary',
            'address' => '444 S.Union St'
        ];

        $db = new DB();
        $crudMysql = DBFactory::build();
        $crudMysql->insert($tableName, $data);
    }
}


$controller = new TestController();
$controller->crudSQLite();




