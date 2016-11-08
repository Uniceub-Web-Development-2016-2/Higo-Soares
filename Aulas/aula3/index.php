<?php
include('request.php');

$method = $_SERVER['REQUEST_METHOD'];
$protocol = $_SERVER['SERVER_PROTOCOL'];
$rest = substr($protocol, 0, -4); 
$server_ip = $_SERVER['SERVER_ADDR'];
$remote_ip = $_SERVER['REMOTE_ADDR'];
$resource = $_SERVER['REQUEST_URI'];
$resource2 = substr($resource, 1,5); 
$params = $_SERVER['QUERY_STRING'];



  //  $request = new Request("GET", "http", "172.22.51.21", "172.22.51.128", "resource", array("par1"=>123,"par2"=>1234));

$request = new request($method, $rest, $server_ip, $remote_ip, $resource2, $params);
 

var_dump($request);






?>
