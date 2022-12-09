<?php
declare(strict_types=1);

   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('test.db');
         $this->createTableUsers();
      }

    public function createTableUsers(): bool {

   		$sql =<<<EOF
   			DROP TABLE IF EXISTS users;
		      CREATE TABLE IF NOT EXISTS users
		      (id INTEGER PRIMARY KEY,
		      name        CHAR(50),
		      email        CHAR(50)
		      );
EOF;
		   $ret = $this->exec($sql);

			return !$ret ? false : true;
    }


   }
