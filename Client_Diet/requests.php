<?php

include('httpful.phar');

$post_request = 'http://localhost/Diet/user/create';

$response = \Httpful\Request::post($post_request)
->sendsJson()
->body(json_encode($_POST))
->send();



	$get_request = 'http://localhost/Diet/user';

	$response2 = \Httpful\Request::get($get_request)->send();
	
	$array = json_decode($response2->body, true);
	foreach ($array as $value => $key) {
		if(!empty($array)){
			echo '
    <script>
        alert("Sucesso!");
        window.location.href = "login.php";
    </script>';
		}
				else {
    	echo     '<script>
		alert("Erro ao cadastrar!");
		window.location.href = "../../Client_Diet/login.php";
	    		</script>';
}
}

	

?>

	

