<?php
/**
 * Created by PhpStorm.
 * User: giangtnm
 * Date: 12/7/17
 * Time: 10:43 AM
 */
function connect_sql($host, $user, $pass)
{
    $conn = new mysqli($host, $user, $pass);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connection successfully";
    return $conn;
}

function create_db($conn, $dbName)
{
    // Create database if it is not exist
    $create_db = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($conn->query($create_db) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    create_tables($conn);
}

function create_tables($conn)
{
// Create table
$create_tables = "CREATE TABLE IF NOT EXISTS company (
  id SERIAL UNIQUE NOT NULL PRIMARY KEY,
  idJobs INT ARRAY,
  company_name TEXT UNIQUE ,
  address TEXT,
  country TEXT,
  logo TEXT,
  urlC TEXT
);

CREATE TABLE IF NOT EXISTS job (
  id SERIAL UNIQUE NOT NULL PRIMARY KEY,
  idPLang INT,
  title TEXT,
  salary MONEY,
  address TEXT,
  time_posted TIME,
  reason TEXT,
  description TEXT,
  skill TEXT,
  qualification TEXT,
  company_name TEXT
);

CREATE TABLE IF NOT EXISTS programming_language(
  id SERIAL UNIQUE NOT NULL PRIMARY KEY ,
  pl_name TEXT
);
CREATE TABLE IF NOT EXISTS user_account(
  id SERIAL UNIQUE NOT NULL PRIMARY KEY ,
  idPLangs INT ARRAY,
  idCompanies INT ARRAY,
  usr_name TEXT,
  email TEXT,
  username TEXT,
  passwd TEXT,
  address TEXT,
  phone TEXT
);";

    if ($conn->query($create_tables) === TRUE) {
        echo "Tables created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

function insert_data($conn, $table, $column, $data) {
    $sql = 'INSERT INTO $table ($column) VALUES $data';
    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function close_connection($conn) {
    $conn->close();
}
?>
