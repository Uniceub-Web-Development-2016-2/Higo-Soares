<?php
include('httpful.phar');
session_start();

	associate_diet_user();
	newDiet2();
	function newDiet2(){
	$new_array = array('cod_diet' => $_SESSION['cod_diet'], 'cod_food' =>$_POST['cod_food'], 'schedule' => $_POST['schedule'], 'amount' => $_POST['amount']);
	$url = 'http://localhost/Diet/diet_food/create';

	$response = \Httpful\Request::post($url)
	->sendsJson()
	->body(json_encode($new_array))
	->send();

	echo '<script>
        alert("Sucesso!");
        window.location.href = "diet.php";
    </script>';

	}

	function associate_diet_user(){
	$assoc_array = array('cod_diet' => $_SESSION['cod_diet'], 'cod_user' =>$_SESSION['id']);
	$body = json_encode($assoc_array);

	$url = 'http://localhost/Diet/user_diet/create';

	$response = \Httpful\Request::post($url)
	->sendsJson()
	->body($body)
	->send();

	
	}


?>