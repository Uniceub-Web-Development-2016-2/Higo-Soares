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

$array = json_decode($response->body, true);

if(empty($array)){
   	echo     '<script>
		alert("Senha ou login inválido!");
		window.location.href = "../../Client_Diet/login.php";
	    		</script>';
}
else{
foreach ($array as $value => $key){
	$id = $key['id'];
}
	$_SESSION['id'] = $id;
	echo '<script>
		alert("Sucesso!");
		window.location.href = "../../Client_Diet/home.php";
	    		</script>';

}


}
else{
	   	echo     '<script>
		alert("Você deve digitar o nome e senha!");
		window.location.href = "../../Client_Diet/login.php";
	    		</script>';
}


?>
