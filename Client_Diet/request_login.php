<?php

include('httpful.phar');


$post_login = 'http://localhost/Diet/user/';

$response = \Httpful\Request::post($post_login)
->sendsJson()
->body(json_encode($_POST))
->send();

echo  $response->body;


