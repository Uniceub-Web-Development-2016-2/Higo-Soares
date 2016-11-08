<?php

include('httpful.phar');


$post_request = 'http://localhost/Diet/user/create';


$response = \Httpful\Request::post($post_request)
->sendsJson()
->body(json_encode($_POST))
->send();

echo  $response->body;
