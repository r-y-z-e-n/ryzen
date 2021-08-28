<?php

class migrate_0001_initial
{
    public function up()
    {
        $db = \ryzen\framework\Application::$app->db;

        $SQL = "CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL, fname VARCHAR (255) NOT NULL ,lname VARCHAR (255) NOT NULL, password VARCHAR (255) NOT NULL) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {

        $db = \ryzen\framework\Application::$app->db;

        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);

    }
}