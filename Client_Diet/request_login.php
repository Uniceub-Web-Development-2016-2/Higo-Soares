<?php

include('httpful.phar');


$post_login = 'http://localhost/Diet/controle/resource_controller.php?';

$response = \Httpful\Request::post($post_login)
->sendsJson()
->body(json_encode($_POST))
->send();

echo  $response->body;
