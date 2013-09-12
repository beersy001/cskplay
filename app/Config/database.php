<?php
//app/Config/bootstrap.php
CakePlugin::load('Mongodb');


// app/Config/database.php
class DATABASE_CONFIG {
    public $default = array(
        'datasource' => 'Mongodb.MongodbSource',
        'host' => 'localhost',
        'database' => 'cskplay',
        'port' => 27017,
        'prefix' => '',
        'persistent' => 'true',
        /* optional auth fields
        'login' => 'mongo', 
        'password' => 'awesomeness',
        'replicaset' => array('host' => 'mongodb://hoge:hogehoge@localhost:27021,localhost:27022/blog', 
                              'options' => array('replicaSet' => 'myRepl')
                     ),
        */
    );

    // To make sure all tests are passing create the following entry in app/Config/database.php
    public $test = array(
        'datasource' => 'Mongodb.MongodbSource',
        'database' => 'cskplay_test',
        'host' => 'localhost',
        'port' => 27017,
    ); 
}