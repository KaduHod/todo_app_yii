<?php

$dsn = "pgsql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'];
return [
    'class' => 'yii\db\Connection',
    'dsn' => $dsn,
    'username' => $_ENV["DB_NAME"],
    'password' => $_ENV["DB_PWD"],
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
