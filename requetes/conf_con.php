<?php

  $DB_HOST = "localhost";
  $DB_NAME = "landingpage";
  $DB_LOGIN = "Cpradlls";
  $DB_PASS = "uu33tZM3FMmnLyxL";

  $DB_DRIVER = "mysql";
  $DB_CHARSET = "utf8mb4";

  $DB_OPTIONS = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // turn on errors in the form of exceptions, good for dev (so no good for prod ^^)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // make the default fetch be an associative array
    PDO::MYSQL_ATTR_FOUND_ROWS   => true // track affected SQL rows, using rowCount
  ];
