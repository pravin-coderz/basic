<?php
function Connect()
{
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "login";
	$link   = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	return $link;
}