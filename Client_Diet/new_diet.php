<?php
include('httpful.phar');
session_start();


	
	newDiet();	
	function newDiet(){
	$url = 'http://localhost/Diet/diet/create';

	$response = \Httpful\Request::post($url)
	->sendsJson()
	->body(json_encode($_POST))
	->send();

	$response->body;
	

	$get_request = 'http://localhost/Diet/diet?dat_init="'.$_POST['dat_init'].'"&dat_final="'.$_POST['dat_final'].'"&ideal_weight="'.$_POST['ideal_weight'].'"&cod_objective="'.$_POST['cod_objective'].'"';

	$response2 = \Httpful\Request::get($get_request)->send();
	
	
	$array = json_decode($response2->body, true);
	foreach ($array as $value => $key) {
		$_SESSION['cod_diet']= $key['id'];
	}
	echo "Prossiga";

	}

	
	


?>