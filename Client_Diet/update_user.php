<?php
include('httpful.phar');

    $url = 'http://localhost/Diet/user/update';
    

    $response = \Httpful\Request::put($url)
    ->sendsJson()
    ->body(json_encode($_POST))
    ->send();


 
    if(!empty($response->body)){
	echo '
    <script>
        alert("Sucesso!");
        window.location.href = "profile.php";
    </script>';
	}else {
    	echo     '<script>
		alert("Erro ao alterar!");
		window.location.href = "../../Client_Diet/profile.php";
	    		</script>';

    }
	
    



?>