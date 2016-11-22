<?php
include('httpful.phar');

session_start();
if($_POST['user'] != null && $_POST["password"] != null){
$_SESSION['user'] = $_POST['user'];

	
$post_login = 'http://localhost/Diet/user/validate_login';

$response = \Httpful\Request::post($post_login)
->sendsJson()
->body(json_encode($_POST))
->send();

echo  $response->body;


}
else{
	echo "Você deve digitar o nome e senha!";
}


?>
