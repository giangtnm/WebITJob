<?php
/**
 * Created by PhpStorm.
 * User: giangtnm
 * Date: 12/7/17
 * Time: 10:43 AM
 */
function initial($host, $user, $pass, $dbName) {
    $conn = new mysqli($host, $user, $pass);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connection successfully";
    // Create database if it is not exist
    $create_db = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($conn->query($create_db) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    $conn->close();
//
//    $conn = new mysqli($host, $user, $pass, $dbName);
//    $sql = "CREATE TABLE IF NOT EXISTS `company` (
//`id_company` INT AUTO_INCREMENT PRIMARY KEY,
//`idJobs` TEXT,
//`company_name` TEXT,
//`address` TEXT,
//`company_logo_link` TEXT,
//`company_link` TEXT,
//`company_job` TEXT
//)";
//    if ($conn->query($sql) === TRUE) {
//        echo "Table `company` created successfully";
//    } else {
//        echo "Error creating table: " . $conn->error;
//    }
//    $conn->close();
//
//    $conn = new mysqli($host, $user, $pass, $dbName);
//
//$sql="CREATE TABLE IF NOT EXISTS `job` (
//`id_job` INT AUTO_INCREMENT PRIMARY KEY,
//`idPLang` TEXT,
//`title` TEXT,
//`salary` INT,
//`address` TEXT,
//`time_posted` TIME,
//`reason` TEXT,
//`description` TEXT,
//`skill` TEXT,
//`qualification` TEXT,
//`company_name` TEXT
//)";
//    if ($conn->query($sql) === TRUE) {
//        echo "Table `job` created successfully";
//    } else {
//        echo "Error creating table: " . $conn->error;
//    }
//    $conn->close();
//
//    $conn = new mysqli($host, $user, $pass, $dbName);
//
//    $sql="CREATE TABLE IF NOT EXISTS programming_language (
//`id_lang` INT AUTO_INCREMENT PRIMARY KEY,
//`pl_name` TEXT
//)";
//    if ($conn->query($sql) === TRUE) {
//        echo "Table `programming_language` created successfully";
//    } else {
//        echo "Error creating table: " . $conn->error;
//    }
//    $conn->close();
//
//    $conn = new mysqli($host, $user, $pass, $dbName);
//
//    $sql="CREATE TABLE IF NOT EXISTS user_account (
//`id_user` INT AUTO_INCREMENT PRIMARY KEY,
//`idPLangs` TEXT,
//`idCompanies` TEXT,
//`usr_name` TEXT,
//`email` TEXT,
//`username` TEXT,
//`passwd` TEXT,
//`address` TEXT,
//`phone` TEXT
//)";
//    if ($conn->query($sql) === TRUE) {
//        echo "Tables `user_account` created successfully";
//    } else {
//        echo "Error creating table: " . $conn->error;
//    }
//    $conn->close();
}
?>
