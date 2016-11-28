<?php
include('httpful.phar');


	function table_foods(){
	$get_request = 'http://localhost/Diet/food/category?cod_category=category.id';

	$response = \Httpful\Request::get($get_request)->send();
	$array = json_decode($response->body, true);
	foreach ($array as $value => $key) {
		echo '<td colspan="1">'.$key['food'].'</td>';
		echo '<td colspan="1">'.$key['calories'].'</td>';
		echo '<td colspan="1">'.$key['category'].'</td></tr>';
	}
	}
	
	function diet(){
	$id = $_SESSION['id'];
	$get_request = 'http://localhost/Diet/user/diet?cod_user=user.id&cod_diet=diet.id&'.$id.'=user.id';

	$response = \Httpful\Request::get($get_request)->send();

	$array = json_decode($response->body, true);
	
	echo 
    '<div class="panel panel-default">';
    $cod_diet="";
	foreach ($array as $value => $key) {
		$cod_diet = $key['cod_diet'];
		echo '<p>Minhas informações '.'</br>'. 'Seu peso: '.$key['weight'].'kg'.'</br>'.'Seu peso ideal: '.$key['ideal_weight'].'kg'.'</br>'.'Data inicial da dieta: '.$key['dat_init'].'</br>'.'Data final da dieta: '.$key['dat_final'].'</br>'.'</p>';
	}
	echo '</div>';
	
	$url = 'http://localhost/Diet/diet/food/objective/category?cod_food=food.id&cod_objective=objective.id&cod_category=category.id&cod_diet=diet.id&'.$cod_diet.'=diet.id';

	$response2 = \Httpful\Request::get($url)->send();
	
	$array2 = json_decode($response2->body, true);

	

	echo'<table class="table"> 
			<thead> 
			<tr> <th>Horário</th> <th>Alimento</th> <th>Grupo Alimentar</th><th>Quantidade(g)</th> </tr>';
	foreach($array2 as $value2 => $key2){
		echo '<tr> <th scope="row">'.$key2['schedule'].'</th> <td>'.$key2['food'].'</td> <td>'.$key2['category'].'</td>'.'<td>'.$key2['amount'].'</td> </tr>';
	}
		echo '</thead> 
			<tbody> 
			</tbody> 
			</table>';

	}

	function profile(){
	$id = $_SESSION['id'];
	$get_request = 'http://localhost/Diet/user?id='.$id;

	$response = \Httpful\Request::get($get_request)->send();

	$array = json_decode($response->body, true);

	foreach ($array as $value => $key) {
	echo '  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Nome</label>
    <div class="col-sm-2">
      <input name="user" required="required" class="form-control form-control-login" id="inputEmail3" value="'.$key['user'].'" type="text">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-2">
      <input name="password" required="required" class="form-control form-control-login" id="inputEmail3"  value="'.$key['password'].'" type="password">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">CPF</label>
    <div class="col-sm-2">
      <input id="cpf" name="cpf" required="required" maxlength="11" class="form-control form-control-login" value="'.$key['cpf'].'" type="text">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">E-mail</label>
    <div class="col-sm-2">
      <input name="email" required="required" class="form-control form-control-login" id="inputEmail3" value="'.$key['email'].'" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Telefone</label>
    <div class="col-sm-2">
      <input name="phone" required="required" maxlength="13" class="form-control form-control-login" id="inputEmail3" value="'.$key['phone'].'" type="text">
	  <!-- pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" -->
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Peso</label>
    <div class="col-sm-2">
      <input name="weight" required="required" class="form-control form-control-login" id="inputEmail3" value="'.$key['weight'].'" type="text">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Altura</label>
    <div class="col-sm-2">
      <input name="height" required="required" class="form-control form-control-login" id="inputEmail3" value="'.$key['height'].'" type="text">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Idade</label>
    <div class="col-sm-2">
      <input name="age" required="required" maxlength="3" class="form-control" id="inputPassword3" value="'.$key['age'].'" pattern="[0-9]+$" type="number">
	  <input name="active" value="1" type="hidden">
	  <input type="hidden" name="id" value="'.$id.'">
	  
    </div>
  </div>';
	}
	}


	function combo_foods($id){
	$url = 'http://localhost/Diet/food?cod_category=category.id&'.$id.'=category.id'; 

	$response2 = \Httpful\Request::get($url)->send();
	$array2 = json_decode($response2->body, true);
	echo '<div class="form-group">
	<label class="col-sm-4 control-label">Alimento</label><div class="col-sm-6">
	<select name="cod_food" id="cod_food" class="form-control">
	<option value="">Selecione o alimento</option>';
	foreach ($array2 as $value2 => $key2) {
	echo '<option value="'.$key2['id'].'">'.$key2['food'].' - '.$key2['calories'].'Kcal'.'</option>';
	}

	echo '</select></div></div>

	<div class="form-group">
	<label for="inputEmail3" class="col-sm-4 control-label">Quantidade(g)</label>
	<div class="col-sm-3">
	<input type="text" name="amount" maxlength="5" class="form-control form-control-login" placeholder="" >
	</div>
	</div>';


	}


	function combo_objective(){
	$get_request = 'http://localhost/Diet/objective';

	$response = \Httpful\Request::get($get_request)->send();
	
	$array = json_decode($response->body, true);
	
	echo '<div class="form-group">
	<label class="col-sm-4 control-label">Objetivo</label><div class="col-sm-6">
	<select name="cod_objective" class="form-control">';
	foreach ($array as $value => $key) {
	echo '<option value="'.$key['id'].'">'.$key['objective'].'</option>';
	}
	echo '</select></div></div>';
	return $key['id'];
	}

	function newDiet2(){
	$url = 'http://localhost/Diet/category';

	$response = \Httpful\Request::get($url)->send();

	$array = json_decode($response->body, true);

	echo '<div class="form-group">
	<label class="col-sm-4 control-label">Categoria</label><div class="col-sm-6">
	<select name="cod_category" id="cod_category" class="form-control" >
	<option value="">Selecione a categoria</option>';
	$id_category="";
	foreach ($array as $value => $key) {
		$id_category=$key['id'];
	echo '<option value="'.$key['id'].'">'.$key['category'].'</option>';
	}

	echo '</select></div></div>';

	combo_foods($id_category);

	

	}

	function home_diets(){
	$url = 'http://localhost/Diet/diet';

	$response = \Httpful\Request::get($url)->send();

	$array = json_decode($response->body, true);
	$qtd = count($array);

	echo $qtd;		


	}

	function home_products(){
	$url = 'http://localhost/Diet/food';

	$response = \Httpful\Request::get($url)->send();

	$array = json_decode($response->body, true);
	$qtd = count($array);

	echo $qtd;		


	}




?>
