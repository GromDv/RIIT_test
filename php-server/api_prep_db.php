<?php
require_once 'lib/db_conn.php';
require_once 'lib/response.php';

$query="DROP DATABASE IF EXISTS rtest;
	CREATE DATABASE rtest;
	USE rtest;

	DROP TABLE IF EXISTS Users;
	CREATE TABLE Users (
	id SERIAL PRIMARY KEY,
	name varchar(50) NOT NULL
	);

	INSERT INTO Users VALUES 
	    (1, 'Vasya'), 
	    (2, 'Petya'),
	    (3, 'Kolya'),
	    (4, 'Vitya'),
	    (5, 'Tolya');

	DROP TABLE IF EXISTS Education;
	CREATE TABLE Education (
	user_id int PRIMARY KEY,
	education varchar(255) NOT NULL
	);
	INSERT INTO Education VALUES 
	    (1, 'Higher'), 
	    (2, 'secondary'),
	    (3, 'secondary specialized'),
	    (4, 'secondary incomplete'),
	    (5, 'Higher');
	    
	DROP TABLE IF EXISTS Places;
	CREATE TABLE Places (
	id SERIAL PRIMARY KEY,
	place varchar(255) NOT NULL
	);
	INSERT INTO Places VALUES 
	    (1, 'Moscow'), 
	    (2, 'St.Piterburg'),
	    (3, 'Saratov'),
	    (4, 'Sochi'),
	    (5, 'Yalta'),
	    (6, 'Volgograd');

	DROP TABLE IF EXISTS User_Places;
	CREATE TABLE User_Places (
	id SERIAL PRIMARY KEY,
	user_id int NOT NULL,
	place_id int NOT NULL
	);
	INSERT INTO User_Places VALUES 
	    (1, 1, 1),
	    (2, 2, 2),
	    (3, 3, 3),
	    (4, 3, 4),
	    (5, 3, 5);";

$result = mysqli_multi_query($link, $query);
$res = new Response();
if($result) {
	$res->success = true;
	$res->message = "DB prepared!";
	$res->total = "";
} else {
	$res->success = false;
	$res->message = "Error DB prepare!";
	$res->total = "";
}

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");

print_r($res->to_json());

