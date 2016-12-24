<?php
session_start();
 
$dbhost = "localhost"; 
$dbname = "car"; 
$dbuser = "root"; 
$dbpass = ""; 
 
$conn = new mysqli($dbhost, $dbuser,$dbpass,$dbname);

if ($conn->connect_error)
{
	die("connection failed :".$conn->connect_error);
	echo "couldnt connect to database";
}